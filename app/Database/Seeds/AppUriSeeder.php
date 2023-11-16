<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

helper('common');

class AppUriSeeder extends Seeder
{
    public function run()
    {
        $aum = new \App\Models\NgApp\AppUriCredentialModel();

        // Array de usuarios
        $uris = [
            [
                'path' => '/admin',
                'permiso' => 'admin_basic',
                'descripcion' => 'Home del Módulo de administración',
                'activo' => 1,
            ],
            
        ];

        saveIfDup( $aum, $uris, ['path'] );

       
    }
}
