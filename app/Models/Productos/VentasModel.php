<?php

namespace App\Models\Productos;

use CodeIgniter\Model;

class VentasModel extends Model
{
    protected $table = 'productos_ventas';
    protected $primaryKey = 'id';
    protected $useAutoIncrement = true;
    protected $allowedFields = ['id_producto', 'id_vendedor', 'fecha_venta', 'precio_venta'];

    
}
