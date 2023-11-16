<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class VentaInsumos extends Migration
{
    public function up()
    {

        // Table de venta_insumos
        $this->forge->addField([
            'id' => [
                'type' => 'INT',
                'constraint' => 10,
                'auto_increment' => true,
            ],
            'id_venta' => [
                'type' => 'INT',
                'constraint' => 5,
                'unsigned' => true,
            ],
            'id_compra' => [
                'type' => 'INT',
                'constraint' => 5,
                'unsigned' => true,
            ],
            'cantidad' => [
                'type' => 'DECIMAL',
                'constraint' => '10,2',
            ],
            'costo' => [
                'type' => 'DECIMAL',
                'constraint' => '10,2',
            ],
            'autorizacion_id' => [
                'type' => 'INT',
                'constraint' => 5,
                'unsigned' => true,
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
        $this->forge->addForeignKey('id_compra', 'compras_insumos', 'id', 'CASCADE', 'CASCADE');
        $this->forge->addForeignKey('autorizacion_id', 'usuarios', 'id', 'CASCADE', 'CASCADE');
        $this->forge->createTable('venta_insumos');

    }

    public function down()
    {
        // Elimina todas las tablas si es necesario
        $this->forge->dropTable('venta_insumos');
    }
}
