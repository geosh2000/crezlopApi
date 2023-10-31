<?php

namespace App\Models\Productos;

use CodeIgniter\Model;

class InventarioModel extends Model
{
    protected $table = 'productos_inventario';
    protected $primaryKey = 'id';
    protected $useAutoIncrement = true;
    protected $allowedFields = ['id_insumo', 'cantidad_actual', 'fecha_actualizacion'];
}
