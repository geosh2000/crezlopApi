<?php

namespace App\Models\Productos;

use CodeIgniter\Model;

class ComprasInsumosModel extends Model
{
    protected $table = 'productos_compras_insumos';
    protected $primaryKey = 'id';
    protected $useAutoIncrement = true;
    protected $allowedFields = ['id_insumo', 'cantidad_comprada', 'costo_compra', 'fecha_compra'];
    protected $useTimestamps = true;
    protected $useSoftDeletes = true;

    protected $afterInsert = ['actualizarInventarioCompra'];

    protected function actualizarInventarioCompra(array $data)
    {
        $insumoId = $data['id_insumo'];
        $cantidadComprada = $data['cantidad_comprada'];

        // Actualiza el inventario para el insumo comprado
        $inventarioModel = new InventarioModel();
        $inventarioModel->where('id_insumo', $insumoId)
            ->set('cantidad_actual', 'cantidad_actual + ' . $cantidadComprada, false)
            ->update();
    }
}
