<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

helper('common');

class InsumosSeeder extends Seeder
{
    public function run()
    {
        $im = new \App\Models\Productos\InsumosModel();

        // Array de usuarios
        $insumos = [
            ['nombre'=>'Acero de lama', 'unidad_de_medida'=>'KG'],
            ['nombre'=>'Lama terminal', 'unidad_de_medida'=>'U'],
            ['nombre'=>'Armella', 'unidad_de_medida'=>'U'],
            ['nombre'=>'Patin', 'unidad_de_medida'=>'U'],
            ['nombre'=>'Carrilera', 'unidad_de_medida'=>'U'],
            ['nombre'=>'Cerradura', 'unidad_de_medida'=>'U'],
            ['nombre'=>'Plato', 'unidad_de_medida'=>'U'],
            ['nombre'=>'Bombo', 'unidad_de_medida'=>'U'],
            ['nombre'=>'Remache', 'unidad_de_medida'=>'U'],
            ['nombre'=>'Resorte', 'unidad_de_medida'=>'U'],
            ['nombre'=>'Planchuela', 'unidad_de_medida'=>'U'],
            ['nombre'=>'Soporte', 'unidad_de_medida'=>'U'],
            ['nombre'=>'Tornillo M6 Cabeza lisa', 'unidad_de_medida'=>'U'],
            ['nombre'=>'Tornillo M8 2-1/2', 'unidad_de_medida'=>'U'],
            ['nombre'=>'Tornillo M8 1', 'unidad_de_medida'=>'U'],
            ['nombre'=>'Eje', 'unidad_de_medida'=>'MTS'],
            ['nombre'=>'BARRA VEHICULAR DOBLE DIRECCIÓN', 'unidad_de_medida'=>'U'],
            ['nombre'=>'BARRA VEHICULAR DOBLE DIRECCIÓN CON PLUMA', 'unidad_de_medida'=>'U'],
            ['nombre'=>'BARRENAS, CINTA Y DISCOS', 'unidad_de_medida'=>'U'],
            ['nombre'=>'BURÓ', 'unidad_de_medida'=>'U'],
            ['nombre'=>'BUTACAS', 'unidad_de_medida'=>'U'],
            ['nombre'=>'CÁMARAS DE SEGURIDAD', 'unidad_de_medida'=>'U'],
            ['nombre'=>'CHAPAS', 'unidad_de_medida'=>'U'],
            ['nombre'=>'CINTAS DE MEDIR', 'unidad_de_medida'=>'U'],
            ['nombre'=>'COMPRESOR Y TALADRO DE PISO', 'unidad_de_medida'=>'U'],
            ['nombre'=>'DISCOS DE CORTE', 'unidad_de_medida'=>'U'],
            ['nombre'=>'DISPENSADOR DE AGUA', 'unidad_de_medida'=>'U'],
            ['nombre'=>'JALADERAS - CHINA', 'unidad_de_medida'=>'U'],
            ['nombre'=>'KIT DE ALARMA', 'unidad_de_medida'=>'U'],
            ['nombre'=>'KIT DE AUTOMATIZACION PUERTAS CORREDIZAS RC1000', 'unidad_de_medida'=>'U'],
            ['nombre'=>'KIT DE SEGURIDAD', 'unidad_de_medida'=>'U'],
            ['nombre'=>'LÁMPARAS', 'unidad_de_medida'=>'U'],
            ['nombre'=>'MAQUINA ROLADORA PARA CORTINAS', 'unidad_de_medida'=>'U'],
            ['nombre'=>'MATERIALES DE OFICINA', 'unidad_de_medida'=>'KIT'],
            ['nombre'=>'MOTOR CENTRAL PARA PUERTAS', 'unidad_de_medida'=>'U'],
            ['nombre'=>'MOTOR PUERTA CORREDERA MARCA ZKTECO', 'unidad_de_medida'=>'U'],
            ['nombre'=>'MOTOR PUERTA DESLIZANTE MARCA WEJOIN', 'unidad_de_medida'=>'U'],
            ['nombre'=>'MUESTRAS DE CHINA', 'unidad_de_medida'=>'KIT'],
            ['nombre'=>'PASADOR SIN RANURA DOBLADO', 'unidad_de_medida'=>'U'],
            ['nombre'=>'PLUMA HIDRAULICA', 'unidad_de_medida'=>'U'],
            ['nombre'=>'PUERTA ALMACÉN', 'unidad_de_medida'=>'U'],
            ['nombre'=>'PUERTA BAÑO', 'unidad_de_medida'=>'U'],
            ['nombre'=>'PUERTA DE GARAGE COLOR BLANCO 10X8 ESTILO AMERICANA CUADRADO CORTO', 'unidad_de_medida'=>'U'],
            ['nombre'=>'PUERTA DE GARAGE COLOR BLANCO 10X8 ESTILO AMERICANA LISA', 'unidad_de_medida'=>'U'],
            ['nombre'=>'PUERTA DE GARAGE COLOR BLANCO 12X8 ESTILO AMERICANA CUADRADO CORTO', 'unidad_de_medida'=>'U'],
            ['nombre'=>'PULIDORA', 'unidad_de_medida'=>'U'],
            ['nombre'=>'SIERRA DE PÉNDULO', 'unidad_de_medida'=>'U'],
            ['nombre'=>'CREMALLERA DENTADA DE ACERO ZINCADO 1MT', 'unidad_de_medida'=>'U'],
            ['nombre'=>'TALADRO', 'unidad_de_medida'=>'U'],
            ['nombre'=>'TAQUETES', 'unidad_de_medida'=>'U'],
            ['nombre'=>'TORNILLOS DMT', 'unidad_de_medida'=>'U'],
            ['nombre'=>'TRANSPALETA HIDRAULICA', 'unidad_de_medida'=>'U'],
            ['nombre'=>'TV LED 32 HIBRIDO', 'unidad_de_medida'=>'U'], 
        ];

        saveIfDup( $im, $insumos, ['nombre'] );

       
    }
}
