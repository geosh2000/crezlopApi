<?php

namespace App\Models\Ventas;

use CodeIgniter\Model;

class VentaDetallesModel extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'venta_detalles';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = true;
    protected $protectFields    = true;
    protected $allowedFields    = ['id_venta', 'input_name_1', 'input_value_1', 'input_name_2', 'input_value_2', 'input_name_3', 'input_value_3', 'input_name_4', 'input_value_4'];

    // Dates
    protected $useTimestamps = true;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    protected $deletedField  = 'deleted_at';

    // Validation
    protected $validationRules      = [];
    protected $validationMessages   = [];
    protected $skipValidation       = false;
    protected $cleanValidationRules = true;

    // Callbacks
    protected $allowCallbacks = true;
    protected $beforeInsert   = [];
    protected $afterInsert    = [];
    protected $beforeUpdate   = [];
    protected $afterUpdate    = [];
    protected $beforeFind     = [];
    protected $afterFind      = [];
    protected $beforeDelete   = [];
    protected $afterDelete    = [];

    // Definir las relaciones como claves foráneas
    protected $belongsTo = [
        'venta' => [
            'model' => 'VentasModel',
            'foreign_key' => 'id_venta',
        ],
    ];
}
