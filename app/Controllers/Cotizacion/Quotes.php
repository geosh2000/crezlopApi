<?php

namespace App\Controllers\Cotizacion;

use App\Controllers\BaseController;

class Quotes extends BaseController
{
    public function index()
    {
        //
    }

    // Detalle de cotizacion, producto por producto
    public function quoteDetail(){

        $jsonData = $this->request->getJSON();
        $invLib = new \App\Libraries\Inventario\Inventario();

        $result = $invLib->materialNeeded( $jsonData );

        gg_response(200, [ 'error' => false, 'msg' => 'Configuración obtenida', 'data' => $result ] );
    }
}
