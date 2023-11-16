<?php

namespace App\Models\Ventas;

use CodeIgniter\Model;

class VentaInsumosModel extends Model
{
    protected $table = 'venta_insumos';
    protected $primaryKey = 'id';
    protected $useAutoIncrement = true;
    protected $allowedFields = ['id_venta', 'id_compra', 'cantidad', 'costo', 'autorizacion_id'];

    protected $useSoftDeletes = false;
    protected $useTimestamps = true;

    // Definir las relaciones como claves foráneas
    protected $belongsTo = [
        'venta' => [
            'model' => 'VentaModel',
            'foreign_key' => 'id_venta',
        ],
        'compra' => [
            'model' => 'App\Models\Productos\ComprasInsumosModel',
            'foreign_key' => 'id_compra',
        ],
        'autorizacion' => [
            'model' => 'App\Models\Usuarios\UsuariosModel',
            'foreign_key' => 'autorizacion_id',
        ],
    ];

    
}
