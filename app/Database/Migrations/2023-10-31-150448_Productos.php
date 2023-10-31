<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateTables extends Migration
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

        // Tabla "productos_insumos"
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
            'id_insumo' => [
                'type' => 'INT',
                'constraint' => 5,
                'unsigned' => true,
            ],
            'cantidad' => [
                'type' => 'DECIMAL',
                'constraint' => '10,2',
            ],
        ]);
        $this->forge->addKey('id', true);
        $this->forge->addForeignKey('id_producto', 'productos_productos', 'id', 'CASCADE', 'CASCADE');
        $this->forge->addForeignKey('id_insumo', 'productos_insumos', 'id', 'CASCADE', 'CASCADE');
        $this->forge->createTable('productos_productos_insumos');

        // Tabla "compras_insumos"
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
            'cantidad_comprada' => [
                'type' => 'DECIMAL',
                'constraint' => '10,2',
            ],
            'costo_compra' => [
                'type' => 'DECIMAL',
                'constraint' => '10,2',
            ],
            'fecha_compra' => [
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
        $this->forge->createTable('productos_compras_insumos');

        // Tabla "inventario"
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
            'cantidad_actual' => [
                'type' => 'DECIMAL',
                'constraint' => '10,2',
            ],
            'fecha_actualizacion' => [
                'type' => 'DATETIME',
            ],
        ]);
        $this->forge->addKey('id', true);
        $this->forge->addForeignKey('id_insumo', 'productos_insumos', 'id', 'CASCADE', 'CASCADE');
        $this->forge->createTable('productos_inventario');

        // Tabla "vendedores"
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
            'otro_campo_de_informacion' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
            ],
        ]);
        $this->forge->addKey('id', true);
        $this->forge->createTable('vendedores');

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
            'fecha_venta' => [
                'type' => 'DATETIME',
            ],
            'precio_venta' => [
                'type' => 'DECIMAL',
                'constraint' => '10,2',
            ],
        ]);
        $this->forge->addKey('id', true);
        $this->forge->addForeignKey('id_producto', 'productos_productos', 'id', 'CASCADE', 'CASCADE');
        $this->forge->addForeignKey('id_vendedor', 'vendedores', 'id', 'CASCADE', 'CASCADE');
        $this->forge->createTable('productos_ventas');

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
            'direccion' => [
                'type' => 'TEXT',
            ],
            // Agrega otros campos según tus necesidades
        ]);
        $this->forge->addKey('id', true);
        $this->forge->createTable('proveedores');

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

        $this->forge->addField([
            'id' => [
                'type' => 'INT',
                'constraint' => 5,
                'unsigned' => true,
                'auto_increment' => true,
            ],
            'id_insumo_proveedor' => [
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
            'fecha_compra' => [
                'type' => 'DATE',
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
        $this->forge->addForeignKey('id_insumo_proveedor', 'productos_insumo_proveedor', 'id', 'CASCADE', 'CASCADE');
        $this->forge->createTable('productos_compras_insumo_proveedor');


    }

    public function down()
    {
        // Elimina todas las tablas si es necesario
        $this->forge->dropTable('productos_productos');
        $this->forge->dropTable('productos_insumos');
        $this->forge->dropTable('productos_productos_insumos');
        $this->forge->dropTable('productos_compras_insumos');
        $this->forge->dropTable('productos_inventario');
        $this->forge->dropTable('productos_ventas');
        $this->forge->dropTable('vendedores');
        $this->forge->dropTable('proveedores');
        $this->forge->dropTable('productos_insumo_proveedor');
        $this->forge->dropTable('productos_compras_insumo_proveedor');
    }
}
