<?php

namespace App\Models\Productos;

use CodeIgniter\Model;

class ProductosModel extends Model
{
    protected $table = 'productos_productos';
    protected $primaryKey = 'id';
    protected $useAutoIncrement = true;
    protected $allowedFields = ['nombre', 'descripcion', 'margen', 'unidad_de_medida'];
    protected $useTimestamps = true;
    protected $useSoftDeletes = true;
}
