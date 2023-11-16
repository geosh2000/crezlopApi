<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class VentDetalles extends Migration
{
    public function up()
    {

        // Tabla "Venta_detalles"
        $this->forge->addField([
            'id' => [
                'type' => 'INT',
                'constraint' => 5,
                'auto_increment' => true,
            ],
            'id_venta' => [
                'type' => 'INT',
                'constraint' => 5,
                'unsigned' => true,
            ],
            'input_name_1' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
            ],
            'input_value_1' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
            ],
            'input_name_2' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
            ],
            'input_value_2' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
            ],
            'input_name_3' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
            ],
            'input_value_3' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
            ],
            'input_name_4' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
            ],
            'input_value_4' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
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
        $this->forge->addForeignKey('id_venta', 'venta_ventas', 'id', 'CASCADE', 'CASCADE');
        $this->forge->createTable('venta_detalles');

       
    }

    public function down()
    {
        // Elimina todas las tablas si es necesario
        $this->forge->dropTable('venta_detalles');
    }
}
