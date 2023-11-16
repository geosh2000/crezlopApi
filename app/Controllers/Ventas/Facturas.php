<?php

namespace App\Controllers\Ventas;

use App\Controllers\BaseController;


class Facturas extends BaseController
{
    protected $fm;
    protected $vm;
    protected $vdm;
    protected $sm;
    protected $cm;
    protected $pm;

    public function __construct(Type $var = null) {
        $this->fm = new \App\Models\Ventas\VentaFacturasModel();
        $this->vm = new \App\Models\Ventas\VentaModel();
        $this->vdm = new \App\Models\Ventas\VentaDetallesModel();
        $this->um = new \App\Models\Usuarios\UsuariosModel();
        $this->cm = new \App\Models\Ventas\ClientesModel();
        $this->pm = new \App\Models\Productos\ProductosModel();
    }

    public function index()
    {
        //
    }

    public function list( $page = 1, $perPage = 50 ){

        // Obtiene parametros desde el get
        $get = $this->request->getGet();

        // Asigna valores a page y perPage, y define valores por default si no se envian
        $page = $get['page'] ?? 1;
        $perPage = $get['items'] ?? 50;

        $factura = $this->fm->select( 'venta_facturas.*, clientes.nombre')
                    ->join( 'clientes', 'clientes.id = venta_facturas.cliente' )
                    ->paginate( $perPage, 'facturas', $page );
        
        $pager = service('pager');

        $pager_links = $this->fm->pager->makeLinks( $page, $perPage, $this->fm->countAllResults() );

        gg_response( 200, [ 'msg' => 'Listado de facturas', 'data' => $factura, 'pager' => $pager_links ] );

    }

    public function showFactura( $showDetail = false ){

        // Obtiene el folio de la factura desde el get
        $folio = $this->request->getGet('folio');

        $totalCost = $this->request->getGet('totalCost') ?? false;
        $productCost = $this->request->getGet('productCost') ?? true;
        $supplies = $this->request->getGet('supplies') ?? true;

        // Valida que el folio no esté vacío
        if( empty($folio) ){
            gg_die( 'Folio obligatorio. No se recibió ningún valor' );
        }

        $facLib = new \App\Libraries\Factura\Factura();

        $factura = $facLib->getFactura( $folio );

        $factura['productos'] = $facLib->clearInputs( $factura['productos'], $showDetail, ['realDetail' => true] );

        $result = [ 'msg' => 'Detalle de factura', 'factura' => $factura['factura'], 'productos'  => $factura['productos'] ];

        if( boolval($totalCost) ){
            $result['factura']['totalCost'] = 0;
            foreach( $result['productos'] as $key => $producto ){
                if( isset( $producto['insumos'] ) && isset( $producto['insumos']['costo'] ) ){
                    $result['factura']['totalCost'] += $producto['insumos']['costo'];
                }
            }
        }

        if( boolval($productCost) ){
            foreach( $result['productos'] as $key => $producto ){
                if( isset( $producto['insumos'] ) && isset ( $producto['insumos']['costo'] ) ){
                    $result['productos'][$key]['costo'] = $producto['insumos']['costo'];
                }
            }
        }

        if( !boolval($supplies) ){
            foreach( $result['productos'] as $key => $producto ){
                if( isset( $producto['insumos'] ) ){
                    unset( $result['productos'][$key]['insumos'] );
                }
            }
        }
       

        gg_response( 200, $result );

    }
}
