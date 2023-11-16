<?php

namespace App\Models\Productos;

use CodeIgniter\Model;

class InsumoProveedoresModel extends Model
{
    protected $table = 'productos_insumo_proveedor';
    protected $primaryKey = 'id';
    protected $useAutoIncrement = true;
    protected $allowedFields = ['id_insumo', 'id_proveedor', 'modelo_proveedor', 'descripcion'];

    protected $useTimestamps = true;
    protected $useSoftDeletes = true;

    protected $createdField = 'created_at';
    protected $updatedField = 'updated_at';
    protected $deletedField = 'deleted_at';

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
