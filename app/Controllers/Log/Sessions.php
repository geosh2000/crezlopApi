<?php

namespace App\Controllers\Log;

use App\Controllers\BaseController;

helper(['common']);

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
}
