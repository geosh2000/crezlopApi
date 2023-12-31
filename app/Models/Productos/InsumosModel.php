<?php

namespace App\Models\Productos;

use CodeIgniter\Model;

class InsumosModel extends Model
{
    protected $table = 'productos_insumos';
    protected $primaryKey = 'id';
    protected $useAutoIncrement = true;
    protected $allowedFields = ['nombre', 'unidad_de_medida'];
    protected $useTimestamps = true;
    protected $useSoftDeletes = true;

    protected $createdField = 'created_at';
    protected $updatedField = 'updated_at';
    protected $deletedField = 'deleted_at';
}
