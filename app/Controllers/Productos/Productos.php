<?php

namespace App\Controllers\Productos;

use App\Controllers\BaseController;

class Productos extends BaseController
{
    public function index()
    {
        //
    }

    public function list(){

        // Carga modelo de productos
        $pm = new \App\Models\Productos\ProductosModel();

        // Obtiene un listado de productos
        $productos = exceptFields(noTimestamps($pm->findAll()), ['margen']);

        // Responde con un json
        gg_response( 200, [ 'msg' => 'Listado de productos', 'data' => $productos ] );
    }
}
