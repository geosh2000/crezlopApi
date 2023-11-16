<?php

namespace App\Models\Productos;

use CodeIgniter\Model;

class ProductosModel extends Model
{
    protected $table = 'productos_productos';
    protected $primaryKey = 'id';
    protected $useAutoIncrement = true;
    protected $allowedFields = ['nombre', 'descripcion', 'margen', 'unidad_de_medida','inputs'];
    protected $useTimestamps = true;
    protected $useSoftDeletes = true;

    // Campos que deseas ocultar en las consultas por defecto
    protected $hidden = ['created_at', 'updated_at', 'deleted_at'];
}
