<?php namespace App\Libraries\Inventario;

helper('common');

class Inventario{
    
    // Guarda las variables de credenciales incluyendo id, username, id_cliente, llave_secreta y valid_until
    public function materialNeeded( $data, $returnFalse = false, $params = [] ){

        $pm = new \App\Models\Productos\ProductosModel();
        $pi = new \App\Models\Productos\InsumosModel();
        $ppi = new \App\Models\Productos\ProductosInsumosModel();

        if( !isset($data->productId) ){
            $productId = getId( $data->producto, $pm, 'nombre' );
        }else{
            $productId = $data->productId;
        }


        $prodConfig = $pm->select('productos_productos.nombre as Producto, productos_productos.inputs, insumos.nombre, insumos.unidad_de_medida, ppi.formula, insumos.id as id_insumo')
                        ->join('productos_productos_insumos as ppi', 'ppi.id_producto = productos_productos.id', 'left')
                        ->join('productos_insumos as insumos', 'insumos.id = ppi.id_insumo', 'left')
                        ->where('productos_productos.id', $productId)
                        ->orderBy('ppi.orden', 'ASC')
                        ->findAll();
        
        // Si los resultados son 0, significa que no existe ninguna configuración para el id del producto
        if ( !$prodConfig || !isset($prodConfig[0]['formula']) ) {
            if( $returnFalse ){
                return false;
            }
            gg_die( 'No existe configuración para este producto' );
        }

        // Determina los inputs necesarios y valida que lleguen en el post
        $inputs = explode(',', $prodConfig[0]['inputs']);
        $medidas = [];
        foreach( $inputs as $k => $m ){
            if( !isset($data->$m) ){
                if( $returnFalse ){
                    return false;
                }
                gg_response(400, [ 'error' => true, 'msg' => 'Faltan datos ('. $m .')' ] );
            }

            $medidas[$m] = $data->$m;
        }
        
        $insumos = [];
        $dbDetail = [];
        foreach($prodConfig as $key => $value){
            $formula = $value['formula'];
            
            if( $formula !== false ){
                eval( '$f = ' . $formula . ';' );
            }
            
            $insumos[$value['nombre']] = $f;
            array_push( $dbDetail, ['id' => $value['id_insumo'], 'nombre' => $value['nombre'], 'value' => $f] );
        }

        $result = [ 'insumos' => $insumos, 'medidas' => $medidas, 'producto' => $prodConfig[0]['Producto'], 'productId' => $productId ];

        if( isset($params['dbDetail']) && $params['dbDetail'] ){
            $result['insumos'] =  $dbDetail;
        }

        return $result;
    }

}
