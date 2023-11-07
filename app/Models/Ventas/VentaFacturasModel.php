<?php

namespace App\Models\Ventas;

use CodeIgniter\Model;

class VentaFacturasModel extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'venta_facturas';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = true;
    protected $protectFields    = true;
    protected $allowedFields    = ['fecha_factura', 'cliente', 'folio', 'status'];

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
            'model' => 'ClientesModel',
            'foreign_key' => 'cliente',
        ],
    ];
    
}
