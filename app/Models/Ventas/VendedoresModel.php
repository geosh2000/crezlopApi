<?php

namespace App\Models\Ventas;

use CodeIgniter\Model;

class VendedoresModel extends Model
{
    protected $table = 'vendedores';
    protected $primaryKey = 'id';
    protected $useAutoIncrement = true;
    protected $allowedFields = ['nombre', 'otro_campo_de_informacion'];
}