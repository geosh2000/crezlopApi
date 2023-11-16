<?php

namespace App\Controllers\Log;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\Request;


class Sessions extends BaseController
{
    public function showUsers()
    {
        $usuarios = new \App\Models\Usuarios\UsuariosModel();
        $roles = new \App\Models\Usuarios\RolesModel();
        $permisos = new \App\Models\Usuarios\PermisosModel();

        $session = session();

        $query = $usuarios->select('usuarios.*, roles.nombre as rol, JSON_ARRAYAGG(permisos.nombre) as permisos')
            ->join('roles', 'roles.id = usuarios.role_id', 'left')
            ->join('permiso_role', 'roles.id = usuarios.role_id', 'left')
            ->join('permisos', 'permisos.id = permiso_role.permiso_id', 'left')
            ->groupBy('usuarios.id')
            ->findAll();

        gg_response(200, [ 'error' => false, 'msg' => 'Usuarios', 'data' => $query, 'session' => $session ] );
    }

    public function moduleGrant(){
        
        // Obtener JSON del post
        $json = $this->request->getJSON();

        // Obtener uri de json
        $uri = $json->uri;

        // Verifica el permiso de la uri en la base de datos
        $uriModel = new \App\Models\NgApp\AppUriCredentialModel();
        $uriData = $uriModel->where('path', $uri)->first();

        // Si no existe la uri en la base de datos, devuelve un error de permisos
        if ( !$uriData ) {
            gg_response(403, [ 'error' => true, 'msg' => 'No tienes permiso para realizar esta acción' ] );
        }

        // Si el dato uriData['permiso'] es null, devuelve permiso true
        if ( $uriData['permiso'] == null ) {
            gg_response(200, [ 'error' => false, 'msg' => 'Permiso obtenido', 'data' => true ] );
        }

        // Obrtiene el token actual y lo decodifica
        $token = getTokenData();

        // Si no existe el token, devuelve un error de permisos
        if ( !$token ) {
            gg_response(403, [ 'error' => true, 'msg' => 'Invalid Token' ] );
        }

        // Query para buscar si el usuario cuenta con el permiso de uriData
        $usuario = new \App\Models\Usuarios\UsuariosModel();
        $permisoRole = new \App\Models\Usuarios\PermisosRoleModel();
        $permisos = new \App\Models\Usuarios\PermisosModel();

        $query = $usuario->select('permisos.nombre')
            ->join('permiso_role', 'permiso_role.role_id = usuarios.role_id', 'left')
            ->join('permisos', 'permisos.id = permiso_role.permiso_id', 'left')
            ->where('usuarios.id', $token['id'])
            ->where('permisos.nombre', $uriData['permiso'])
            ->where('permiso_role.deleted_at IS NULL', null, false)
            ->first();
        
        // Si los resultados son 0, significa que el usuario no tiene el permiso
        if ( !$query ) {
            gg_response(403, [ 'error' => true, 'msg' => 'No tienes permiso para realizar esta acción' ] );
        }

        // Si el usuario tiene el permiso, devuelve un mensaje de exito
        gg_response(200, [ 'error' => false, 'msg' => 'Permiso obtenido', 'data' => true ] );

    }
}
