<?php

namespace App\Models\Productos;

use CodeIgniter\Model;

class ComprasLoteModel extends Model
{
    protected $table = 'compras_lote';
    protected $primaryKey = 'id';
    protected $useAutoIncrement = true;
    protected $allowedFields = ['fecha_compra', 'factura', 'gasto_envio', 'gasto_transporte', 'monto_aduana', 'porcentaje_prorrateo' ];
    protected $useTimestamps = true;
    protected $useSoftDeletes = true;

    protected $createdField = 'created_at';
    protected $updatedField = 'updated_at';
    protected $deletedField = 'deleted_at';
}
