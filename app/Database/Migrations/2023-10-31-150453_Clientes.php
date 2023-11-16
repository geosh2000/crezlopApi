<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Clientes extends Migration
{
    public function up()
    {

        // Ejecutar el seeder de Insumos
        $seeder = \Config\Database::seeder();

        // Tabla "clientes"
        $this->forge->addField([
            'id' => [
                'type' => 'INT',
                'constraint' => 10,
                'auto_increment' => true,
            ],
            'nombre' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
            ],
            'direccion' => [
                'type' => 'TEXT',
            ],
            'telefono' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
            ],
            'email' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
            ],
            'tiene_credito' => [
                'type' => 'BOOLEAN',
                'default' => false,
            ],
            'descuento' => [
                'type' => 'DECIMAL',
                'constraint' => '10,2',
            ],
            'limite_credito' => [
                'type' => 'DECIMAL',
                'constraint' => '10,2',
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
                'default' => null,
            ],
            // Agrega otros campos según tus necesidades
        ]);
        $this->forge->addKey('id', true);
        $this->forge->createTable('clientes');


    }

    public function down()
    {
        // Elimina todas las tablas si es necesario
        $this->forge->dropTable('clientes');
    }
}
