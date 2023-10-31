<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class RolSeeder extends Seeder
{
    public function run()
    {
        $sm = new \App\Models\Usuarios\RolesModel();

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
        
    }
}
