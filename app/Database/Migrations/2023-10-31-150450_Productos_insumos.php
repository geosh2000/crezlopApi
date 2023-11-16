<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class ProductosInsumos extends Migration
{
    public function up()
    {

        // Ejecutar el seeder de Insumos
        $seeder = \Config\Database::seeder();

        // Tabla "productos_insumos"
        $this->forge->addField([
            'id_producto' => [
                'type' => 'INT',
                'constraint' => 5,
                'unsigned' => true,
            ],
            'id_insumo' => [
                'type' => 'INT',
                'constraint' => 5,
                'unsigned' => true,
            ],
            'orden' => [
                'type' => 'INT',
                'constraint' => 5,
                'unsigned' => true,
            ],
            'formula' => [
                'type' => 'TEXT',
            ]
        ]);
        $this->forge->addPrimaryKey(['id_producto', 'id_insumo']);
        $this->forge->addForeignKey('id_producto', 'productos_productos', 'id', 'CASCADE', 'CASCADE');
        $this->forge->addForeignKey('id_insumo', 'productos_insumos', 'id', 'CASCADE', 'CASCADE');
        $this->forge->createTable('productos_productos_insumos');

        

    }

    public function down()
    {
        // Elimina todas las tablas si es necesario
        $this->forge->dropTable('productos_productos_insumos');
    }
}
