<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class ComprasInsumos extends Migration
{
    public function up()
    {

        // Tabla "compras_insumos"
        $this->forge->addField([
            'id' => [
                'type' => 'INT',
                'constraint' => 5,
                'unsigned' => true,
                'auto_increment' => true,
            ],
            'id_lote' => [
                'type' => 'INT',
                'constraint' => 5,
                'unsigned' => true,
            ],
            'id_insumo' => [
                'type' => 'INT',
                'constraint' => 5,
                'unsigned' => true,
            ],
            'cantidad_comprada' => [
                'type' => 'DECIMAL',
                'constraint' => '10,2',
            ],
            'costo_compra' => [
                'type' => 'DECIMAL',
                'constraint' => '10,2',
            ],
            'costo_prorrateo' => [
                'type' => 'DECIMAL',
                'constraint' => '10,2',
            ],
            'fecha_compra' => [
                'type' => 'DATE',
            ],
            'fecha_recepcion' => [
                'type' => 'DATE',
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
        $this->forge->addForeignKey('id_insumo', 'productos_insumos', 'id', 'CASCADE', 'CASCADE');
        $this->forge->addForeignKey('id_lote', 'compras_lote', 'id', 'CASCADE', 'CASCADE');
        $this->forge->createTable('compras_insumos');


    }

    public function down()
    {
        // Elimina todas las tablas si es necesario
        $this->forge->dropTable('compras_insumos');
    }
}
