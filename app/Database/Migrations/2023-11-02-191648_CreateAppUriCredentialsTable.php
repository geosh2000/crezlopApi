<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateAppUriCredentialsTable extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'path' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
            ],
            'permiso' => [
                'type' => 'VARCHAR',
                'constraint' => 50,
            ],
            'descripcion' => [
                'type' => 'TEXT',
                'null' => true,
            ],
            'activo' => [
                'type' => 'BOOLEAN',
                'default' => true,
            ],
            'created_at' => [
                'type' => 'DATETIME',
                'null' => true,
            ],
            'updated_at' => [
                'type' => 'DATETIME',
                'null' => true,
            ],
            'deleted_at' => [
                'type' => 'DATETIME',
                'null' => true,
            ],
        ]);

        $this->forge->addPrimaryKey('path');
        $this->forge->createTable('app_uri_credentials');
    }

    public function down()
    {
        $this->forge->dropTable('app_uri_credentials');
    }
}
