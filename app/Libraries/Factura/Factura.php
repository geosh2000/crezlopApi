<?php namespace App\Libraries\Factura;

helper('common');

class Factura{
    
    // Guarda las variables de credenciales incluyendo id, username, id_cliente, llave_secreta y valid_until
    public function getFactura( $folio, $returnFalse = false ){

        $fm = new \App\Models\Ventas\VentaFacturasModel();
        $vm = new \App\Models\Ventas\VentaModel();
        $vdm = new \App\Models\Ventas\VentaDetallesModel();
        $sm = new \App\Models\Usuarios\UsuariosModel();
        $cm = new \App\Models\Ventas\ClientesModel();
        $pm = new \App\Models\Productos\ProductosModel();
        
        $factura = $fm->select( 'venta_facturas.*, clientes.nombre')
            ->where( 'folio', $folio )
            ->join( 'clientes', 'clientes.id = venta_facturas.cliente' )
            ->first();

        if( ifEmpty( $factura, 'No se encontró la factura', $returnFalse ) ){
            return false;
        }

        $productos = $vm->select( 'venta_ventas.*, productos_productos.nombre as producto, usuarios.nombre as vendedor, input_name_1, input_value_1, input_name_2, input_value_2, input_name_3, input_value_3, , input_name_4, input_value_4')
                    ->join( 'venta_detalles', 'venta_detalles.id_venta = venta_ventas.id' )
                    ->join( 'productos_productos', 'productos_productos.id = venta_ventas.id_producto' )
                    ->join( 'usuarios', 'usuarios.id = venta_ventas.id_vendedor' )
                    ->where( 'venta_ventas.id_factura', $factura['id'] )
                    ->findAll();

        return [ 'factura' => $factura, 'productos' => $productos ];
    }

    public function getRealInsumos( $idVenta ){
        $vim = new \App\Models\Ventas\VentaInsumosModel();
        $cim = new \App\Models\Productos\ComprasInsumosModel();
        $ipm = new \App\Models\Productos\InsumoProveedoresModel();

        $insumos = $vim->select( 'venta_insumos.*, productos_insumos.nombre as insumo, productos_insumo_proveedor.modelo_proveedor' )
                    ->join( 'compras_insumos', 'compras_insumos.id = venta_insumos.id_compra' )
                    ->join( 'productos_insumo_proveedor', 'productos_insumo_proveedor.id = compras_insumos.id_insumo' )
                    ->join( 'productos_insumos', 'productos_insumos.id = productos_insumo_proveedor.id_insumo' )
                    ->where( 'venta_insumos.id_venta', $idVenta )
                    ->findAll();
        
        $costo = 0;

        foreach( $insumos as $key => $insumo ){
            $insumos[$key]['costo'] = floatval( $insumo['costo'] );
            $costo += sanitize_ammount($insumo['costo']);
        }

        return ['insumos' => ['material' => $insumos, 'costo' => sanitize_ammount($costo)]];
    }

    public function clearInputs( $productos, $material = false, $params = [] ){

        // params incluye: 
        //     dbDetail para materialNeeded de libreria inventario
        
        // params realDetail para obtener los insumos reales de la base de datos
        $params['realDetail'] = $params['realDetail'] ?? false;

        $invLib = new \App\Libraries\Inventario\Inventario();

        foreach( $productos as $key => $producto ){

            $medidas = new \stdClass();
            $medidas->productId = $producto['id_producto'];

            // Por cada input_name_# crear una variable con el input_name y asignarle el valor de input_value_#
            for( $i = 1; $i <= 4; $i++ ){
                if( $producto['input_name_'.$i] != null ){
                    $productos[$key][ $producto['input_name_'.$i] ] = $producto['input_value_'.$i];
                    $medidas->{$producto['input_name_'.$i]} = $producto['input_value_'.$i];
                }

                // Eliminar los campos input_name_# y input_value_#
                unset( $productos[$key]['input_name_'.$i] );
                unset( $productos[$key]['input_value_'.$i] );

                // Si el parametro material es true, obtiene el material necesario
                if( $material ){

                    // Si el parametro realDetail es true, obtiene los insumos reales de la base de datos
                    $result = $params['realDetail'] ? $this->getRealInsumos( $producto['id'] ) : $invLib->materialNeeded( $medidas, true, $params );
    
                    if( $result ){
                        $productos[$key]['insumos'] = $result['insumos'];
                    }

                }
            }
        }

        return $productos;
    }

}



