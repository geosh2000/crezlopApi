<?php

namespace App\Models\Productos;

use CodeIgniter\Model;

class ProductosInsumosModel extends Model
{
    protected $table = 'productos_productos_insumos';
    protected $primaryKey = 'id';
    protected $useAutoIncrement = true;
    protected $allowedFields = ['id_producto', 'id_insumo', 'cantidad'];

    // Definir las relaciones como claves foráneas
    protected $belongsTo = [
        'producto' => [
            'model' => 'ProductosModel',
            'foreign_key' => 'id_producto',
        ],
        'insumo' => [
            'model' => 'InsumosModel',
            'foreign_key' => 'id_insumo',
        ],
    ];
}


