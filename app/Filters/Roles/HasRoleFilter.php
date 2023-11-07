<?php

namespace App\Filters\Roles;

use CodeIgniter\Filters\FilterInterface;
use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;

helper(['common']);

class HasRoleFilter implements FilterInterface
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
        $token = getTokenData();

        if( !$token ){
            gg_response(401, [ 'error' => true, 'msg' => 'Invalid Token' ] );
        }

        $usuario = new \App\Models\Usuarios\UsuariosModel();
        $permisoRole = new \App\Models\Usuarios\PermisosRoleModel();
        $permisos = new \App\Models\Usuarios\PermisosModel();

        $query = $usuario->select('permisos.nombre')
            ->join('permiso_role', 'permiso_role.role_id = usuarios.role_id', 'left')
            ->join('permisos', 'permisos.id = permiso_role.permiso_id', 'left')
            ->where('usuarios.id', $token['id'])
            ->where('permisos.nombre', $arguments[0])
            ->first();

        // Si los resultados son 0, significa que el usuario no tiene el permiso
        if ( !$query ) {
            gg_response(403, [ 'error' => true, 'msg' => 'No tienes permiso para realizar esta acción' ] );
        }

        return $request;
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
