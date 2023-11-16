<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

helper('common');

class InsumoProveedorSeeder extends Seeder
{
    public function run()
    {
        $ipm = new \App\Models\Productos\InsumoProveedoresModel();
        $im = new \App\Models\Productos\InsumosModel();

        // Array de usuarios
        $insumos = [
            [
                'nombre' => 'Planchuela',
            ]
        ];

        foreach($insumos as $insumo => $in ){
            $id = $im->where('nombre', $in['nombre'])->first();
            $arr = [
                'id_insumo' => $id['id'],
                'id_proveedor' => 1,
                'modelo_proveedor' => 'modelo_'.$in['nombre'],
                'descripcion' => 'descripcion_'.$in['nombre'],
            ];

            saveIfDup( $ipm, [$arr], ['id_insumo', 'id_proveedor'] );
        }


       
    }
}
