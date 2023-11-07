<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class RolSeeder extends Seeder
{
    public function run()
    {
        $sm = new \App\Models\Usuarios\RolesModel();
        $pm = new \App\Models\Usuarios\PermisosModel();
        $prm = new \App\Models\Usuarios\PermisosRoleModel();

        // Array de roles
        $roles = [
            [
                'nombre' => 'Super Administrador',
            ],
            [
                'nombre' => 'Administrador',
            ],
            [
                'nombre' => 'Usuario',
            ],
        ];

        // Using Query Builder
        $sm->insertBatch($roles);

        $permisos = [
            [
                'nombre' => 'sessions_show_all',
                'descripcion' => 'Muestra todas las sesiones activas'
            ],
            [
                'nombre' => 'user_modify_role',
                'descripcion' => 'Permite modificar el perfil de cada usuario'
            ],
            [
                'nombre' => 'app_basic',
                'descripcion' => 'Ingreso basico a Admin en App'
            ],
            [
                'nombre' => 'quotes_detailed',
                'descripcion' => 'Detalle pieza por pieza de insumos para una cotizacion'
            ],
        ];

        $pm->insertBatch($permisos);

        $permiso_role = [
            [
                'role_id' => 1,
                'permiso_id' => 1
            ],
            [
                'role_id' => 1,
                'permiso_id' => 2
            ],
            [
                'role_id' => 1,
                'permiso_id' => 3
            ],
            [
                'role_id' => 1,
                'permiso_id' => 4
            ],
            [
                'role_id' => 2,
                'permiso_id' => 3
            ],
            [
                'role_id' => 2,
                'permiso_id' => 4
            ],
            [
                'role_id' => 3,
                'permiso_id' => 3
            ],
        ];

        $prm->insertBatch($permiso_role);
        
    }
}
