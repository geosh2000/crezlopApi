<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

helper('common');

class VentaInsumoSeeder extends Seeder
{
    public function run()
    {
        $vm = new \App\Models\Ventas\VentaModel();
        $vdm = new \App\Models\Ventas\VentaDetallesModel();
        $cim = new \App\Models\Productos\ComprasInsumosModel();
        $ipm = new \App\Models\Productos\InsumoProveedoresModel();

        $puertas = $vm->join( 'venta_detalles', 'venta_detalles.id_venta = venta_ventas.id' )
                    ->where('input_value_1 !=', '')
                    ->where('id_producto', 1)->findAll();

        $facLib = new \App\Libraries\Factura\Factura();

        $puertas['productos'] = $facLib->clearInputs( $puertas, true, ['dbDetail' => true]);

        $ventaInsumosBatch = [];

        foreach( $puertas['productos'] as $key => $producto ){
            $puertas['productos'][$key]['ventaInsumos'] = [];
            foreach( $producto['insumos'] as $k => $insumo ){
                $compra = $cim->select("compras_insumos.id as id, CAST(costo_compra/cantidad_comprada*".$insumo['value']." as DECIMAL(10,2)) as costo", false)
                                ->join('productos_insumo_proveedor as pip', 'pip.id = compras_insumos.id_insumo', 'left')
                                ->where('pip.id_insumo', $insumo['id'])->first();

                $puertas['productos'][$key]['ventaInsumos'][$k] = [
                    'id_venta' => $producto['id'],
                    'cantidad' => $insumo['value'],
                    'id_compra' => $compra['id'] ?? 0,
                    'costo' => $compra['costo'] ?? 0,
                    'autorizacion_id' => 1
                ];

                $puertas['productos'][$key]['ventaInsumos'][$k]['id_venta'] = intval( $puertas['productos'][$key]['ventaInsumos'][$k]['id_venta'] ); 
                $puertas['productos'][$key]['ventaInsumos'][$k]['id_compra'] = intval( $puertas['productos'][$key]['ventaInsumos'][$k]['id_compra'] ); 
                $puertas['productos'][$key]['ventaInsumos'][$k]['costo'] = floatval( $puertas['productos'][$key]['ventaInsumos'][$k]['costo'] ); 

                array_push( $ventaInsumosBatch, $puertas['productos'][$key]['ventaInsumos'][$k] );
            }
        }

        $vim = new \App\Models\Ventas\VentaInsumosModel();

        saveIfDup( $vim, $ventaInsumosBatch, ['id_venta', 'id_compra'] );
    }
}
