<?php

namespace App\Controllers;

use App\Controllers\BaseController;


class Test extends BaseController
{
    public function index()
    {
        // Devuelve un mensaje de éxito
        gg_response(200, ['error' => false, 'msg' => 'Hola mundo']);
    }
}
