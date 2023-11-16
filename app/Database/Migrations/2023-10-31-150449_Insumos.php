<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Insumos extends Migration
{
    public function up()
    {

        // Tabla "insumos"
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
                'unique' => true,
            ],
            'unidad_de_medida' => [
                'type' => 'VARCHAR',
                'constraint' => 50,
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
        $this->forge->createTable('productos_insumos');

        

    }

    public function down()
    {
        // Elimina todas las tablas si es necesario
        $this->forge->dropTable('productos_insumos');
    }
}
