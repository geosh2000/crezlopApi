<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

helper('common');

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
        saveIfDup( $sm, $roles, ['nombre'] );

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
            [
                'nombre' => 'invoices_list',
                'descripcion' => 'Muestra un listado de las facturas'
            ],
            [
                'nombre' => 'show_invoices_detail',
                'descripcion' => 'Muestra el detalle completo de las facturas'
            ],
            [
                'nombre' => 'admin_basic',
                'descripcion' => 'Funciones básicas de administrador'
            ],
        ];

        saveIfDup( $pm, $permisos, ['nombre'] );

        $permiso_role = [
            [
                'role' => 'Super Administrador',
                'permisos' => [
                        'sessions_show_all',
                        'user_modify_role',
                        'app_basic',
                        'quotes_detailed',
                        'show_invoices_detail',
                        'invoices_list',
                        'admin_basic',
                    ]
            ],
            [
                'role' => 'Administrador',
                'permisos' => [
                        'app_basic',
                        'quotes_detailed',
                        'show_invoices_detail',
                        'invoices_list',
                        'admin_basic',
                    ]
            ],
            [
                'role' => 'Usuario',
                'permisos' => [
                        'app_basic',
                    ]
            ],
        ];

        $permisoBatch = [];
        foreach( $permiso_role as $permiso => $pr ){
            foreach( $pr['permisos'] as $perm => $p ){
                array_push( $permisoBatch, [
                    'role_id' => $sm->where('nombre', $pr['role'])->first()['id'],
                    'permiso_id' => $pm->where('nombre', $p)->first()['id'] ?? 100,
                ]);
            }
        }

        // $prm->insertBatch($permisoBatch);
        saveIfDup( $prm, $permisoBatch, ['role_id', 'permiso_id'] );

    }
}
