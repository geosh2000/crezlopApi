<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class InsumosProveedor extends Migration
{
    public function up()
    {

        $this->forge->addField([
            'id' => [
                'type' => 'INT',
                'constraint' => 5,
                'unsigned' => true,
                'auto_increment' => true,
            ],
            'id_insumo' => [
                'type' => 'INT',
                'constraint' => 5,
                'unsigned' => true,
            ],
            'id_proveedor' => [
                'type' => 'INT',
                'constraint' => 5,
                'unsigned' => true,
            ],
            'modelo_proveedor' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
            ],
            'descripcion' => [
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
        $this->forge->addForeignKey('id_insumo', 'productos_insumos', 'id', 'CASCADE', 'CASCADE');
        $this->forge->addForeignKey('id_proveedor', 'proveedores', 'id', 'CASCADE', 'CASCADE');
        $this->forge->createTable('productos_insumo_proveedor');

    }

    public function down()
    {
        // Elimina todas las tablas si es necesario
        $this->forge->dropTable('productos_insumo_proveedor');
    }
}
