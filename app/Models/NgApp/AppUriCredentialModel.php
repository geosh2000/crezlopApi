<?php

namespace App\Models\NgApp;

use CodeIgniter\Model;

class AppUriCredentialModel extends Model
{
    protected $table = 'app_uri_credentials';
    protected $primaryKey = 'path';

    protected $allowedFields = [
        'path',
        'permiso',
        'descripcion',
        'activo',
    ];

    protected $useSoftDeletes = true;
    protected $useTimestamps = true;
    protected $createdField = 'created_at';
    protected $updatedField = 'updated_at';
    protected $deletedField = 'deleted_at';
}
