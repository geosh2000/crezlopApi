<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateTables extends Migration
{
    public function up()
    {

        // Ejecutar el seeder de Insumos
        $seeder = \Config\Database::seeder();

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
            'inputs' => [
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
            'orden' => [
                'type' => 'INT',
                'constraint' => 5,
                'unsigned' => true,
            ],
            'formula' => [
                'type' => 'TEXT',
            ]
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
        $this->forge->createTable('clientes');

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
        $this->forge->addForeignKey('id_vendedor', 'vendedores', 'id', 'CASCADE', 'CASCADE');
        $this->forge->addForeignKey('id_factura', 'venta_facturas', 'id', 'CASCADE', 'CASCADE');
        $this->forge->createTable('venta_ventas');

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

        $seeder->call('App\Database\Seeds\ClientesSeeder');
        $seeder->call('App\Database\Seeds\ProductosInsumosSeeder');
        $seeder->call('App\Database\Seeds\FacturasSeeder');


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
