<?php

namespace App\Models\Ventas;

use CodeIgniter\Model;

class VentaModel extends Model
{
    protected $table = 'venta_ventas';
    protected $primaryKey = 'id';
    protected $useAutoIncrement = true;
    protected $allowedFields = ['id_producto', 'id_vendedor', 'precio_venta', 'id_factura' , 'notas'];

    // Definir las relaciones como claves foráneas
    protected $belongsTo = [
        'producto' => [
            'model' => 'ProductosModel',
            'foreign_key' => 'id_producto',
        ],
        'vendedor' => [
            'model' => 'VendedoresModel',
            'foreign_key' => 'id_vendedor',
        ],
        'factura' => [
            'model' => 'FacturasModel',
            'foreign_key' => 'id_factura',
        ],
    ];

    
}
