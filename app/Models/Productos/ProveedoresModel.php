<?php

namespace App\Models\Productos;

use CodeIgniter\Model;

class ProveedoresModel extends Model
{
    protected $table = 'proveedores';
    protected $primaryKey = 'id';
    protected $useAutoIncrement = true;
    protected $allowedFields = ['nombre', 'direccion'];

    protected $useTimestamps = true;
    protected $useSoftDeletes = true;
}
