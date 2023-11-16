<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Venta extends Migration
{
    public function up()
    {


        // Tabla venta_facturas
        $this->forge->addField([
            'id' => [
                'type' => 'INT',
                'constraint' => 5,
                'auto_increment' => true,
                'unsigned' => true,
            ],
            'fecha_factura' => [
                'type' => 'DATETIME',
            ],
            'cliente' => [
                'type' => 'INT',
                'constraint' => 10,
            ],
            'folio' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
            ],
            'status' => [
                'type' => 'ENUM',
                'constraint' => ['cotizacion','pagada', 'pendiente', 'cancelada'],
                'default' => 'cotizacion',
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
        $this->forge->addForeignKey('cliente', 'clientes', 'id', 'CASCADE', 'CASCADE');
        $this->forge->createTable('venta_facturas');

        // Tabla "ventas"
        $this->forge->addField([
            'id' => [
                'type' => 'INT',
                'constraint' => 5,
                'unsigned' => true,
                'auto_increment' => true,
            ],
            'id_producto' => [
                'type' => 'INT',
                'constraint' => 5,
                'unsigned' => true,
            ],
            'id_vendedor' => [
                'type' => 'INT',
                'constraint' => 5,
                'unsigned' => true,
            ],
            'precio_venta' => [
                'type' => 'DECIMAL',
                'constraint' => '10,2',
            ],
            'notas' => [
                'type' => 'TEXT',
            ],
            'id_factura' => [
                'type' => 'INT',
                'constraint' => 5,
                'unsigned' => true,
            ],
        ]);
        $this->forge->addKey('id', true);
        $this->forge->addForeignKey('id_producto', 'productos_productos', 'id', 'CASCADE', 'CASCADE');
        $this->forge->addForeignKey('id_vendedor', 'usuarios', 'id', 'CASCADE', 'CASCADE');
        $this->forge->addForeignKey('id_factura', 'venta_facturas', 'id', 'CASCADE', 'CASCADE');
        $this->forge->createTable('venta_ventas');

        
    }

    public function down()
    {
        // Elimina todas las tablas si es necesario
        $this->forge->dropTable('venta_facturas');
        $this->forge->dropTable('venta_ventas');
    }
}
