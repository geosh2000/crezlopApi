<?php

namespace App\Models\Productos;

use CodeIgniter\Model;

class InsumoProveedorModel extends Model
{
    protected $table = 'productos_insumo_proveedor';
    protected $primaryKey = 'id';
    protected $useAutoIncrement = true;
    protected $allowedFields = ['id_insumo', 'id_proveedor', 'modelo_proveedor', 'descripcion'];

    protected $useTimestamps = false;
    protected $useSoftDeletes = false;

    // Define las relaciones como claves foráneas
    protected $belongsTo = [
        'insumo' => [
            'model' => 'InsumosModel',
            'foreign_key' => 'id_insumo',
        ],
        'proveedor' => [
            'model' => 'ProveedoresModel',
            'foreign_key' => 'id_proveedor',
        ],
    ];
}
