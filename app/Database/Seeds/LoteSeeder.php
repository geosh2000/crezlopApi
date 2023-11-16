<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

helper('common');

class LoteSeeder extends Seeder
{
    public function run()
    {
        $lm = new \App\Models\Productos\ComprasLoteModel();

        // Array de usuarios
        $lotes = [
            [
                'fecha_compra' => '20230501',
                'factura' => '20230001',
                'gasto_envio' => 8813.44,
                'gasto_transporte' => 333.33,
                'gasto_otros' => 2132.42, 
                'monto_aduana' => 1030.1,
                'porcentaje_prorrateo' => 0.0514566,
            ],
            [
                'fecha_compra' => '20230601',
                'factura' => '20230002',
                'gasto_envio' => 4000,
                'gasto_transporte' => 360,
                'gasto_otros' => 138.53,
                'monto_aduana' => 532.23,
                'porcentaje_prorrateo' => 0.13966095,
            ],
            [
                'fecha_compra' => '20230623',
                'factura' => '20230003'
            ],
            
        ];

        saveIfDup( $lm, $lotes, ['factura'] );

       
    }
}
