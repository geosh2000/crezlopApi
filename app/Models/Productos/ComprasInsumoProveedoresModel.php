<?php

namespace App\Models\Productos;

use CodeIgniter\Model;

class ComprasInsumoProveedorModel extends Model
{
    protected $table = 'productos_compras_insumo_proveedor';
    protected $primaryKey = 'id';
    protected $useAutoIncrement = true;
    protected $allowedFields = ['id_insumo_proveedor', 'cantidad_comprada', 'costo_compra', 'fecha_compra'];

    protected $useTimestamps = true;

    // Define la relación con la tabla insumo_proveedor como clave foránea
    protected $belongsTo = [
        'insumo_proveedor' => [
            'model' => 'InsumoProveedorModel',
            'foreign_key' => 'id_insumo_proveedor',
        ],
    ];
}
