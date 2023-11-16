<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

helper('common');

class ProveedoresSeeder extends Seeder
{
    public function run()
    {
        $pm = new \App\Models\Productos\ProveedoresModel();

        // Array de usuarios
        $proveedores = [
            [
                'nombre' => 'Niplito',
                'direccion' => 'Cancun, Mexico'
            ],
            [
                'nombre' => 'China',
                'direccion' => 'HK, China'
            ],
            
        ];

        saveIfDup( $pm, $proveedores, ['nombre'] );

       
    }
}
