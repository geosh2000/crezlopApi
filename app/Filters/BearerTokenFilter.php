<?php

namespace App\Filters;

use CodeIgniter\Filters\FilterInterface;
use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;

helper(['common']);

date_default_timezone_set('America/Cancun');

class BearerTokenFilter implements FilterInterface
{
    /**
     * Do whatever processing this filter needs to do.
     * By default it should not return anything during
     * normal execution. However, when an abnormal state
     * is found, it should return an instance of
     * CodeIgniter\HTTP\Response. If it does, script
     * execution will end and that Response will be
     * sent back to the client, allowing for error pages,
     * redirects, etc.
     *
     * @param RequestInterface $request
     * @param array|null       $arguments
     *
     * @return mixed
     */
    public function before(RequestInterface $request, $arguments = null)
    {
        // Obtiene el token de la cabecera
        $token = $request->getServer('HTTP_AUTHORIZATION');

        // Valida que el token no esté vacío y que comience con la palabra "Bearer "
        if ( empty($token) || !str_starts_with($token, 'Bearer ') ) {
            gg_response(401, [ 'error' => true, 'msg' => 'Invalid Token' ] );
        }

        // Obtiene el bearer token del encabezado, quitando la palabra "Bearer " del inicio
        $bearerToken = str_replace('Bearer ', '', $token);
        
        // Usa el encrypter de CI4 para decodificar el token. hace un try catch del decrypt. Si falla, devuelve un error
        try {
            $tokenDataJson = \Config\Services::encrypter()->decrypt($bearerToken);
        } catch (\Exception $e) {
            gg_response(401, [ 'error' => true, 'msg' => 'Invalid Token' ] );
        }

        // Valida que el token decodificado sea un json_encoded en formato texto y lo convierte a objeto. Si no es un json, devuelve un error
        $tokenData = json_decode($tokenDataJson, true);
        if ( !is_array($tokenData) ) {
            gg_response(401, [ 'error' => true, 'msg' => 'Invalid Token' ] );
        }

        // Pasa el token a los controladores
        $request->arguments['token'] = $tokenData;

        
        // Valida que el token tenga los datos necesarios
        if ( !isset($tokenData['id']) || !isset($tokenData['email']) || !isset($tokenData['started_at']) || !isset($tokenData['ip'])) {
            gg_response(401, [ 'error' => true, 'msg' => 'Invalid Token' ] );
        }

        // Obtiene de la base de datos la sesion activa con id, email e ip
        $uas = new \App\Models\Usuarios\UsersActiveSessionsModel();
        $activeSession = $uas
            ->where('email', $tokenData['email'])
            ->where('ip', $tokenData['ip'])
            ->where('client', $_SERVER['HTTP_USER_AGENT'])
            ->first();
        
        // Valida que exista la sesion activa
        if ( !$activeSession ){
            gg_response(401, [ 'error' => true, 'msg' => 'Invalid Token' ] );
        }

        // Compara $activeSession con $tokenData
        if ( $activeSession['email'] != $tokenData['email'] 
             || $activeSession['ip'] != $tokenData['ip']
             || $activeSession['client'] != $_SERVER['HTTP_USER_AGENT']
             || $activeSession['session_started_at'] != date('Y-m-d H:i:s', $tokenData['started_at'])) {

            $result = [
                'email' => $activeSession['email'] != $tokenData['email'],
                'ip' => $activeSession['ip'] != $tokenData['ip'],
                'client' => $activeSession['client'] != $_SERVER['HTTP_USER_AGENT'],
                'session_started_at' => $activeSession['session_started_at'] != date('Y-m-d H:i:s', $tokenData['started_at']),
                'activeSession' => $activeSession['session_started_at'],
                'tokenData' => date('Y-m-d H:i:s', $tokenData['started_at']),
            ];

            gg_response(401, [ 'error' => true, 'msg' => 'Invalid Token', 'debug' => $result ] );
        }
    }

    /**
     * Allows After filters to inspect and modify the response
     * object as needed. This method does not allow any way
     * to stop execution of other after filters, short of
     * throwing an Exception or Error.
     *
     * @param RequestInterface  $request
     * @param ResponseInterface $response
     * @param array|null        $arguments
     *
     * @return mixed
     */
    public function after(RequestInterface $request, ResponseInterface $response, $arguments = null)
    {
        //
    }
}
