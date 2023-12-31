<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Productos extends Migration
{
    public function up()
    {

        

        // Tabla "productos"
        $this->forge->addField([
            'id' => [
                'type' => 'INT',
                'constraint' => 5,
                'unsigned' => true,
                'auto_increment' => true,
            ],
            'nombre' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
            ],
            'descripcion' => [
                'type' => 'TEXT',
            ],
            'margen' => [
                'type' => 'DECIMAL',
                'constraint' => '10,2',
            ],
            'unidad_de_medida' => [
                'type' => 'VARCHAR',
                'constraint' => 50,
            ],
            'inputs' => [
                'type' => 'TEXT',
            ],
            'created_at' => [
                'type' => 'DATETIME',
            ],
            'updated_at' => [
                'type' => 'DATETIME',
            ],
            'deleted_at' => [
                'type' => 'DATETIME',
                'null' => true,
                'default' => null,
            ],
        ]);
        $this->forge->addKey('id', true);
        $this->forge->createTable('productos_productos');
    }

    public function down()
    {
        $this->forge->dropTable('productos_productos');
    }
}
