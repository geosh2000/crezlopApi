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
}
