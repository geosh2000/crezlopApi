<?php

namespace App\Models\Productos;

use CodeIgniter\Model;

class ComprasInsumosModel extends Model
{
    protected $table = 'compras_insumos';
    protected $primaryKey = 'id';
    protected $useAutoIncrement = true;
    protected $allowedFields = ['id_insumo', 'cantidad_comprada', 'costo_compra', 'fecha_compra', 'id_lote', 'fecha_recepcion'];
    protected $useTimestamps = true;
    protected $useSoftDeletes = true;

    protected $createdField = 'created_at';
    protected $updatedField = 'updated_at';
    protected $deletedField = 'deleted_at';


    protected $belongsTo = [
        'insumo' => [
            'model' => 'App\Models\Productos\InsumosModel',
            'foreign_key' => 'id_insumo'
        ],
        'lote' => [
            'model' => 'App\Models\Productos\ComprasLoteModel',
            'foreign_key' => 'id_lote'
        ]
    ];

}
