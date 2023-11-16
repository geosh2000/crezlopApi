<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class MasterSeeder extends Seeder
{
    public function run()
    {
        // Ejecutar el seeder de Insumos
        $seeder = \Config\Database::seeder();

        // Correr seeders
        $seeder->call('RolSeeder');
        $seeder->call('UserSeeder');
        $seeder->call('ClientesSeeder');
        $seeder->call('AppUriSeeder');
        $seeder->call('LoteSeeder');
        $seeder->call('ProveedoresSeeder');
        $seeder->call('InsumosSeeder');
        $seeder->call('InsumoProveedorSeeder');
        $seeder->call('ProductosInsumosSeeder');
        $seeder->call('InsumosProveedorSeeder');
        $seeder->call('InsumosCompraSeeder');
        $seeder->call('FacturasSeeder');
        $seeder->call('VentaInsumoSeeder');
    }
}
