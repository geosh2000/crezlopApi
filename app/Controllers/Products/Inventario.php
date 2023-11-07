<?php

namespace App\Controllers\Products;

use App\Controllers\BaseController;

helper(['common']);

class Inventario extends BaseController
{
    public function index()
    {
        //
    }

    // Detalle de cotizacion, producto por producto
    public function quoteDetail(){
        $jsonData = $this->request->getJSON();

        $productId = $jsonData->productId;

        $pm = new \App\Models\Productos\ProductosModel();
        $pi = new \App\Models\Productos\InsumosModel();
        $ppi = new \App\Models\Productos\ProductosInsumosModel();

        $prodConfig = $pm->select('productos_productos.nombre as Producto, productos_productos.inputs, insumos.nombre, insumos.unidad_de_medida, ppi.formula')
                        ->join('productos_productos_insumos as ppi', 'ppi.id_producto = productos_productos.id', 'left')
                        ->join('productos_insumos as insumos', 'insumos.id = ppi.id_insumo', 'left')
                        ->where('productos_productos.id', $productId)
                        ->orderBy('ppi.orden', 'ASC')
                        ->findAll();
        
        // Si los resultados son 0, significa que no existe ninguna configuración para el id del producto
        if ( !$prodConfig ) {
            gg_response(403, [ 'error' => true, 'msg' => 'No existe configuración para este producto' ] );
        }

        // Determina los inputs necesarios y valida que lleguen en el post
        $inputs = explode(',', $prodConfig[0]['inputs']);
        $medidas = [];
        foreach( $inputs as $k => $m ){
            if( !isset($jsonData->$m) ){
                gg_response(400, [ 'error' => true, 'msg' => 'Faltan datos ('. $m .')' ] );
            }

            $medidas[$m] = $jsonData->$m;
        }
        
        $insumos = [];
        foreach($prodConfig as $key => $value){
            $formula = $value['formula'];
            
            if( $formula !== false ){
                eval( '$insumos[$value["nombre"]] = ' . $formula . ';' );
            }else{
                $insumos[$value['nombre']] = $formula;
            }
        }

        gg_response(200, [ 'error' => false, 'msg' => 'Configuración obtenida', 'data' => $insumos, 'medidas' => $medidas, 'producto' => $prodConfig[0]['Producto'] ] );
    }
}
