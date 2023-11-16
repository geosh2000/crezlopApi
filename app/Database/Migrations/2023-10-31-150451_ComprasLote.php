<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class ComprasLote extends Migration
{
    public function up()
    {

        // Tabla "compras_lote"
        $this->forge->addField([
            'id' => [
                'type' => 'INT',
                'constraint' => 5,
                'unsigned' => true,
                'auto_increment' => true,
            ],
            'fecha_compra' => [
                'type' => 'DATE',
            ],
            'factura' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
            ],
            'gasto_envio' => [
                'type' => 'DECIMAL',
                'constraint' => '10,2',
                'default' => 0,
            ],
            'gasto_transporte' => [
                'type' => 'DECIMAL',
                'constraint' => '10,2',
                'default' => 0,
            ],
            'gasto_otros' => [
                'type' => 'DECIMAL',
                'constraint' => '10,2',
                'default' => 0,
            ],
            'monto_aduana' => [
                'type' => 'DECIMAL',
                'constraint' => '10,2',
                'default' => 0,
            ],
            'porcentaje_prorrateo' => [
                'type' => 'DECIMAL',
                'constraint' => '10,8',
                'default' => 0,
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
            // Agrega otros campos según tus necesidades
        ]);
        $this->forge->addKey('id', true);
        $this->forge->createTable('compras_lote');

        // Inversiones
        $this->forge->addField([
            'id' => [
                'type' => 'INT',
                'constraint' => 5,
                'auto_increment' => true,
            ],
            'id_lote' => [
                'type' => 'INT',
                'constraint' => 5,
                'unsigned' => true,
            ],
            'inversionista_id' => [
                'type' => 'INT',                
                'constraint' => 5,
                'unsigned' => true,
            ],
            'monto' => [
                'type' => 'DECIMAL',
                'constraint' => '10,2',
            ],
            'tipo_movimiento' => [
                'type' => 'ENUM',
                'constraint' => ['inversion', 'recuperacion', 'reinversion', 'prestamo', 'devolucion', 'pago_prestamo'],
                'default' => 'inversion',
            ],
            'interes' => [
                'type' => 'DECIMAL',
                'constraint' => '10,4',
                'null' => false,
                'default' => 0,
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
            // Agrega otros campos según tus necesidades
        ]);
        $this->forge->addKey('id', true);
        $this->forge->addForeignKey('id_lote', 'compras_lote', 'id', 'CASCADE', 'CASCADE');
        $this->forge->addForeignKey('inversionista_id', 'usuarios', 'id', 'CASCADE', 'CASCADE');
        $this->forge->createTable('compras_inversiones');

       
    }

    public function down()
    {
        // Elimina todas las tablas si es necesario
        $this->forge->dropTable('compras_inversiones');
        $this->forge->dropTable('compras_lote');
    }
}
