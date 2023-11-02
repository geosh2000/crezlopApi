<?php

namespace App\Models\Usuarios;

use CodeIgniter\Model;

class PermisosRoleModel extends Model
{
    protected $table = 'permiso_role';
    protected $primaryKey = ['role_id', 'permiso_id'];
    protected $useSoftDeletes = true;

    protected $allowedFields = ['role_id', 'permiso_id', 'created_at', 'updated_at', 'deleted_at'];

    protected $useTimestamps = true;
}
