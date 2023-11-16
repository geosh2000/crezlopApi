<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

helper('common');

class UserSeeder extends Seeder
{
    public function run()
    {
        $us = new \App\Models\Usuarios\UsuariosModel();

        // Array de usuarios
        $usuarios = [
            [
                'nombre' => 'Super',
                'apellido' => 'Administrador',
                'email' => 'superadmin@geoshglobal.com',
                'password' => password_hash('@12345', PASSWORD_DEFAULT),
            ],
            [
                'nombre' => 'Administrador',
                'apellido' => 'Administrador',
                'email' => 'admin@geoshglobal.com',
                'password' => password_hash('@AdminGg2023', PASSWORD_DEFAULT),
            ],
            [
                'nombre' => 'Daniel',
                'apellido' => 'Lopez',
                'email' => 'dlopez@crezlop.com',
                'password' => password_hash('12345', PASSWORD_DEFAULT),
                'isSeller' => 1,
                'isInvestor' => 1
            ],
            [
                'nombre' => 'Osmay',
                'apellido' => 'Crespo',
                'email' => 'ocrespo@crezlop.com',
                'password' => password_hash('12345', PASSWORD_DEFAULT),
                'isSeller' => 1,
                'isInvestor' => 1
            ],
            [
                'nombre' => 'Felix',
                'apellido' => 'Felix',
                'email' => 'felix@crezlop.com',
                'password' => password_hash('12345', PASSWORD_DEFAULT),
                'isSeller' => 1,
                'isInvestor' => 1
            ],
            [
                'nombre' => 'Usuario',
                'apellido' => 'Usuario',
                'email' => 'user@geoshglobal.com',
                'password' => password_hash('12345', PASSWORD_DEFAULT),
                'isSeller' => 1
            ],

        ];

        // Using Query Builder
        // $us->insertBatch($usuarios);
        saveIfDup( $us, $usuarios, ['email'] );

        // Establece roles para cada usuario del array
        $this->db->table('usuarios')->set('role_id', 1)->where('email', 'superadmin@geoshglobal.com')->update();
        $this->db->table('usuarios')->set('role_id', 2)->where('email', 'admin@geoshglobal.com')->update();
        $this->db->table('usuarios')->set('role_id', 3)->where('email', 'user@geoshglobal.com')->update();
        $this->db->table('usuarios')->set('role_id', 2)->where('email', 'dlopez@crezlop.com')->update();
        $this->db->table('usuarios')->set('role_id', 2)->where('email', 'ocrespo@crezlop.com')->update();
        $this->db->table('usuarios')->set('role_id', 2)->where('email', 'felix@crezlop.com')->update();


    }
}
