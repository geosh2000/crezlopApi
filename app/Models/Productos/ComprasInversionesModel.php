<?php

namespace App\Models\Productos;

use CodeIgniter\Model;

class ComprasInversionesModel extends Model
{
    protected $table = 'compras_inversiones';
    protected $primaryKey = 'id';
    protected $useAutoIncrement = true;
    protected $allowedFields = ['id_lote', 'inversionista_id', 'monto', 'tipo_movimiento', 'interes'];
    protected $useTimestamps = true;
    protected $useSoftDeletes = true;

    protected $createdField = 'created_at';
    protected $updatedField = 'updated_at';
    protected $deletedField = 'deleted_at';

    protected $belongsTo = [
        'lote' => [
            'model' => 'App\Models\Productos\ComprasLoteModel',
            'foreign_key' => 'id_lote'
        ],
        'inversionista' => [
            'model' => 'App\Models\Usuarios\UsuariosModel',
            'foreign_key' => 'inversionista_id'
        ]
    ];
}
