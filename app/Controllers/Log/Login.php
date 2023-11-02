<?php

namespace App\Controllers\Log;

use App\Controllers\BaseController;

// Carga el helper common
helper(['common']);

class Login extends BaseController
{
    public function index()
    {
        //
    }

    public function login()
    {

        // Verifica si existe el post isPostman
        if ( $this->request->getPost('isPostman') ) {
            $email = $this->request->getPost('email');
            $password = $this->request->getPost('password');
            $ip = $this->request->getPost('ip');
        }else{
            // Asigna el JSON a una variable
            $json = $this->request->getJSON();
    
            // Asigna los valores del formulario a variables
            $email = $json->email;
            $password = $json->password;
            $ip = $json->ip;
        }


        // Valida que el email y la contraseña no estén vacíos
        if (empty($email) || empty($password)) {
            // gg_die('Email o contraseña vacíos');
            gg_response(400, [ 'error' => true, 'msg' => 'error en campos', 'data' => $this->request->getJSON() ] );
        }

        $um = new \App\Models\Usuarios\UsuariosModel();

        // Valida que el email exista en la base de datos
        $user = $um->where('email', $email)->first();

        // Si el email existe, valida que la contraseña sea correcta
        if ( !$user ){
            gg_response(400, [ 'error' => true, 'msg' => 'Usuario o contraseña inválidos' ] );
        }

        // Valida que la contraseña sea correcta
        if ( password_verify($password, $user->password) ) {

            // Carga la librería Cookie si aún no está cargada
            helper('cookie');

            //  Duracion de la cookie en segundos
            $cookieLength = 86400;
            $cookieStartedAt = time();

            // Si la contraseña es correcta, crea la cookie
            $cookie = [
                'id' => $user->id,
                'nombre' => $user->nombre,
                'apellido' => $user->apellido,
                'email' => $user->email,
                'isLoggedIn' => true,
                'started_at' => $cookieStartedAt,
                'session_length' => $cookieLength, 
            ];

            set_cookie('sessionCookie', json_encode($cookie,true), $cookieLength);

            // Crea un token de sesion para usar como BasicAuth combinando id con email, encriptado con herramientas de CI
            $encrypter = \Config\Services::encrypter();
            $tokenData = [ 'id' => $user->id, 'email' => $user->email, 'ip' => $ip, 'started_at' => $cookieStartedAt ];
            $token = $encrypter->encrypt(json_encode($tokenData, true));

            // Crea un registro de log de login
            $lm = new \App\Models\Usuarios\LogsModel();
            $lm->log( $user->id, 'login', $ip );

            // Activa la sesion
            $uas = new \App\Models\Usuarios\UsersActiveSessionsModel();
            $uas->registerActiveSession( $ip, $user->email, date('Y-m-d H:i:s', $cookieStartedAt), date('Y-m-d H:i:s', $cookieStartedAt + $cookieLength) );

            // Define array para localstorage de aplicación solicitante
            $localStorage = [
                'nombre' => $user->nombre,
                'apellido' => $user->apellido,
                'email' => $user->email,
                'ip' => $ip,
            ];

            // Devuelve el token
            gg_response(200, [ 'error' => false, 'msg' => 'Logueo correcto', 'token' => $token, 'userData' => $localStorage ]);

        } else {
            gg_response(400, [ 'error' => true, 'msg' => 'Usuario o contraseña inválidos' ] );
        }
        
    }

    public function logout(){

        helper('cookie');

        // Revisa si existe una cookie activa
        if ( !get_cookie('sessionCookie') ){
            gg_die('No hay una sesión activa');
        }

        $session = json_decode(get_cookie('sessionCookie'));

        // Crea un registro de log de logout
        $lm = new \App\Models\Usuarios\LogsModel();
        $lm->log( $session->id, 'logout' );

        // Destruye la cookie
        delete_cookie('sessionCookie');

        // Devuelve un mensaje de éxito
        gg_response(200, [ 'error' => false, 'msg' => 'Sesión cerrada' ] );

    }

    protected function sessionTimeLeft(){

        // Obtén la marca de tiempo en la que se creó la variable de sesión temporal
        $tiempoCreacion = $session->started_at;

        // Obtén la duración de vida de la sesión temporal en segundos
        $duracionVida = $session->session_length;

        // Calcula el tiempo restante en segundos
        $tiempoActual = time();
        $tiempoExpiracion = $tiempoCreacion + $duracionVida;
        return $tiempoExpiracion - $tiempoActual;

    }

    public function show(){

        $token = getTokenData();

        if( !$token ){
            gg_die( 'No hay una sesión activa' );
        }

        $uas = new \App\Models\Usuarios\UsersActiveSessionsModel();
        $activeSession = $uas
            ->where('email', $token['email'])
            ->where('ip', $token['ip'])
            ->where('client', $_SERVER['HTTP_USER_AGENT'])
            ->first();
        
        // Devuelve los datos de la sesion
        gg_response(200, [ 'error' => false, 'msg' => 'Datos de la sesión', 'data' => $activeSession ]);
    }
}
