<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class ProductosInsumosSeeder extends Seeder
{
    public function run(){
        $pi = new \App\Models\Productos\InsumosModel();
        $pp = new \App\Models\Productos\ProductosModel();
        $ppi = new \App\Models\Productos\ProductosInsumosModel();
        $seeder = \Config\Database::seeder();

        $insumos = [
            [
                'nombre' => 'Patin',
                'unidad_de_medida' => 'unidad',
                'orden' => 20,
                'formula' => "ceil((\$insumos['Acero de lama'] / \$medidas['ancho']) * 2)"
            ],
            [
                'nombre' => 'Remache',
                'unidad_de_medida' => 'unidad',
                'orden' => 30,
                'formula' => "\$insumos['Patin']*2"
            ],
            [
                'nombre' => 'Bombo',
                'unidad_de_medida' => 'unidad',
                'orden' => 40,
                'formula' => "\$medidas['ancho'] <= 4 ? 2 : 3"
            ],
            [
                'nombre' => 'Resorte',
                'unidad_de_medida' => 'unidad',
                'orden' => 50,
                'formula' => "\$medidas['ancho'] <= 4 ? 2 : 3"
            ],
            [
                'nombre' => 'Plato',
                'unidad_de_medida' => 'unidad',
                'orden' => 60,
                'formula' => "2"
            ],
            [
                'nombre' => 'Eje',
                'unidad_de_medida' => 'unidad',
                'orden' => 70,
                'formula' => "1"
            ],
            [
                'nombre' => 'Soporte',
                'unidad_de_medida' => 'unidad',
                'orden' => 80,
                'formula' => "2"
            ],
            [
                'nombre' => 'Cerradura',
                'unidad_de_medida' => 'unidad',
                'orden' => 90,
                'formula' => "1"
            ],
            [
                'nombre' => 'Carrillera',
                'unidad_de_medida' => 'unidad',
                'orden' => 100,
                'formula' => "1"
            ],
            [
                'nombre' => 'Armella',
                'unidad_de_medida' => 'unidad',
                'orden' => 110,
                'formula' => "2"
            ],
            [
                'nombre' => 'Planchuela',
                'unidad_de_medida' => 'unidad',
                'orden' => 120,
                'formula' => "2"
            ],
            [
                'nombre' => 'Tornillo M6 Cabeza lisa',
                'unidad_de_medida' => 'unidad',
                'orden' => 130,
                'formula' => "6"
            ],
            [
                'nombre' => 'Tornillo M8 2-1/2',
                'unidad_de_medida' => 'unidad',
                'orden' => 140,
                'formula' => "4"
            ],
            [
                'nombre' => 'Tornillo M8 1',
                'unidad_de_medida' => 'unidad',
                'orden' => 150,
                'formula' => "8"
            ],
            [
                'nombre' => 'Lama terminal',
                'unidad_de_medida' => 'unidad',
                'orden' => 160,
                'formula' => "1"
            ],
            [
                'nombre' => 'Acero de lama',
                'unidad_de_medida' => 'metro',
                'orden' => 10,
                'formula' => "round(ceil(\$medidas['alto'] * 100 / 9) * \$medidas['ancho'],2)"
            ],

            
        ];

        saveIfDup( $pi, $insumos, ['nombre'] );

        $productos = [
            [
                'nombre' => 'PUERTA ENROLLABLE',
                'descripcion' => 'Puerta para comercio enrollable estilo español',
                'margen' => 2,
                'unidad_de_medida' => 'metro cuadrado',
                'inputs' => 'alto,ancho'
            ],
            ["nombre"=>"BARRA VEHICULAR DOBLE DIRECCIÓN","descripcion"=>"","margen"=>"1","unidad_de_medida"=>"","inputs"=>"largo,alto,m2"],
            ["nombre"=>"COMPONENTES","descripcion"=>"","margen"=>"1","unidad_de_medida"=>"","inputs"=>"largo,alto,m2"],
            ["nombre"=>"CORTINA PATINADA","descripcion"=>"","margen"=>"1","unidad_de_medida"=>"","inputs"=>"largo,alto,m2"],
            ["nombre"=>"INSTALACIÓN Y MONTAJE","descripcion"=>"","margen"=>"1","unidad_de_medida"=>"","inputs"=>"largo,alto,m2"],
            ["nombre"=>"KIT DE AUTOMATIZACIÓN RC1000","descripcion"=>"","margen"=>"1","unidad_de_medida"=>"","inputs"=>"largo,alto,m2"],
            ["nombre"=>"LAMA","descripcion"=>"","margen"=>"1","unidad_de_medida"=>"","inputs"=>"largo,alto,m2"],
            ["nombre"=>"MOTOR CENTRAL PARA PUERTAS","descripcion"=>"","margen"=>"1","unidad_de_medida"=>"","inputs"=>"largo,alto,m2"],
            ["nombre"=>"MOTOR PUERTA CORREDERA ","descripcion"=>"","margen"=>"1","unidad_de_medida"=>"","inputs"=>"largo,alto,m2"],
            ["nombre"=>"PUERTA SECCIONAL","descripcion"=>"","margen"=>"1","unidad_de_medida"=>"","inputs"=>"largo,alto,m2"],
        ];

        $pp->insertBatch($productos);

        $prod_ins = [
            [
                'id_producto' => 1,
                'id_insumo' => "Patin",
                'orden' => 20,
                'formula' => "ceil((\$insumos['Acero de lama'] / \$medidas['ancho']) * 2)"
            ],
            [
                'id_producto' => 1,
                'id_insumo' => "Remache",
                'orden' => 30,
                'formula' => "\$insumos['Patin']*2"
            ],
            [
                'id_producto' => 1,
                'id_insumo' => "Bombo",
                'orden' => 40,
                'formula' => "\$medidas['ancho'] <= 4 ? 2 : 3"
            ],
            [
                'id_producto' => 1,
                'id_insumo' => "Resorte",
                'orden' => 50,
                'formula' => "\$medidas['ancho'] <= 4 ? 2 : 3"
            ],
            [
                'id_producto' => 1,
                'id_insumo' => "Plato",
                'orden' => 60,
                'formula' => "2"
            ],
            [
                'id_producto' => 1,
                'id_insumo' => "Eje",
                'orden' => 70,
                'formula' => "1"
            ],
            [
                'id_producto' => 1,
                'id_insumo' => "Soporte",
                'orden' => 80,
                'formula' => "2"
            ],
            [
                'id_producto' => 1,
                'id_insumo' => "Cerradura",
                'orden' => 90,
                'formula' => "1"
            ],
            [
                'id_producto' => 1,
                'id_insumo' => "Carrilera",
                'orden' => 100,
                'formula' => "1"
            ],
            [
                'id_producto' => 1,
                'id_insumo' => "Armella",
                'orden' => 110,
                'formula' => "2"
            ],
            [
                'id_producto' => 1,
                'id_insumo' => "Planchuela",
                'orden' => 120,
                'formula' => "2"
            ],
            [
                'id_producto' => 1,
                'id_insumo' => "Tornillo M6 Cabeza lisa",
                'orden' => 130,
                'formula' => "6"
            ],
            [
                'id_producto' => 1,
                'id_insumo' => "Tornillo M8 2-1/2",
                'orden' => 140,
                'formula' => "4"
            ],
            [
                'id_producto' => 1,
                'id_insumo' => "Tornillo M8 1",
                'orden' => 150,
                'formula' => "8"
            ],
            [
                'id_producto' => 1,
                'id_insumo' => "Lama terminal",
                'orden' => 160,
                'formula' => "1"
            ],
            [
                'id_producto' => 1,
                'id_insumo' => "Acero de lama",
                'orden' => 10,
                'formula' => "ceil(ceil(\$medidas['alto'] * 100 / 9) * \$medidas['ancho'])"
            ],
        ];

        $pi = new \App\Models\Productos\InsumosModel();
        foreach($prod_ins as $key => $prod_in){
            $prod_ins[$key]['id_insumo'] = $pi->where('nombre', $prod_in['id_insumo'])->first()['id'];
        }

        saveIfDup( $ppi, $prod_ins, ['id_producto', 'id_insumo'] );

    }
}
