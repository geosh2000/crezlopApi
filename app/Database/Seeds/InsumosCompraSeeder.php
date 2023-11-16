<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

helper('common');

class InsumosCompraSeeder extends Seeder
{
    public function run()
    {
        $ci = new \App\Models\Productos\ComprasInsumosModel();

        // Array de usuarios
        $compras = [
            ['insumo'=>'Acero de lama', 'lote'=>'20230001','cantidad_comprada'=>7652,'costo_compra'=>18900.44],
            ['insumo'=>'Planchuela', 'lote'=>'20230001','cantidad_comprada'=>10000,'costo_compra'=>0],
            ['insumo'=>'Lama terminal', 'lote'=>'20230001','cantidad_comprada'=>100,'costo_compra'=>3351],
            ['insumo'=>'Armella', 'lote'=>'20230001','cantidad_comprada'=>200,'costo_compra'=>74],
            ['insumo'=>'Patin', 'lote'=>'20230001','cantidad_comprada'=>5000,'costo_compra'=>600],
            ['insumo'=>'Carrilera', 'lote'=>'20230001','cantidad_comprada'=>100,'costo_compra'=>1588.5],
            ['insumo'=>'Cerradura', 'lote'=>'20230001','cantidad_comprada'=>80,'costo_compra'=>160],
            ['insumo'=>'Plato', 'lote'=>'20230001','cantidad_comprada'=>200,'costo_compra'=>2611],
            ['insumo'=>'Bombo', 'lote'=>'20230001','cantidad_comprada'=>200,'costo_compra'=>888],
            ['insumo'=>'Remache', 'lote'=>'20230001','cantidad_comprada'=>3000,'costo_compra'=>103.2],
            ['insumo'=>'Resorte', 'lote'=>'20230001','cantidad_comprada'=>200,'costo_compra'=>2890],
            ['insumo'=>'Soporte', 'lote'=>'20230001','cantidad_comprada'=>200,'costo_compra'=>104],
            ['insumo'=>'Tornillo M6 Cabeza lisa', 'lote'=>'20230001','cantidad_comprada'=>1000,'costo_compra'=>195.1022],
            ['insumo'=>'Tornillo M8 2-1/2', 'lote'=>'20230001','cantidad_comprada'=>1000,'costo_compra'=>195.1022],
            ['insumo'=>'Tornillo M8 1', 'lote'=>'20230001','cantidad_comprada'=>1000,'costo_compra'=>195.1022],
            ['insumo'=>'Eje', 'lote'=>'20230001','cantidad_comprada'=>360,'costo_compra'=>4132.8],
            ['insumo'=>'BARRA VEHICULAR DOBLE DIRECCIÓN','lote'=>'20230001','cantidad_comprada'=>15,'costo_compra'=>6277.95],
            ['insumo'=>'BARRA VEHICULAR DOBLE DIRECCIÓN CON PLUMA','lote'=>'20230002','cantidad_comprada'=>10,'costo_compra'=>4185.2],
            ['insumo'=>'BARRENAS, CINTA Y DISCOS','lote'=>'20230002','cantidad_comprada'=>1000,'costo_compra'=>194.117647058824],
            ['insumo'=>'BURÓ','lote'=>'20230003','cantidad_comprada'=>1,'costo_compra'=>304],
            ['insumo'=>'BUTACAS','lote'=>'20230003','cantidad_comprada'=>3,'costo_compra'=>319.56],
            ['insumo'=>'CÁMARAS DE SEGURIDAD','lote'=>'20230001','cantidad_comprada'=>8,'costo_compra'=>674.96],
            ['insumo'=>'CHAPAS','lote'=>'20230001','cantidad_comprada'=>2,'costo_compra'=>33.33],
            ['insumo'=>'CINTAS DE MEDIR','lote'=>'20230001','cantidad_comprada'=>2,'costo_compra'=>55.5555555555556],
            ['insumo'=>'COMPRESOR Y TALADRO DE PISO','lote'=>'20230001','cantidad_comprada'=>1,'costo_compra'=>323.23],
            ['insumo'=>'DISCOS DE CORTE','lote'=>'20230001','cantidad_comprada'=>10,'costo_compra'=>166.666666666667],
            ['insumo'=>'DISPENSADOR DE AGUA','lote'=>'20230001','cantidad_comprada'=>1,'costo_compra'=>143],
            ['insumo'=>'JALADERAS - CHINA','lote'=>'20230001','cantidad_comprada'=>80,'costo_compra'=>18.4],
            ['insumo'=>'KIT DE ALARMA','lote'=>'20230001','cantidad_comprada'=>1,'costo_compra'=>637.04],
            ['insumo'=>'KIT DE AUTOMATIZACION PUERTAS CORREDIZAS RC1000','lote'=>'20230002','cantidad_comprada'=>25,'costo_compra'=>3984.5],
            ['insumo'=>'KIT DE SEGURIDAD','lote'=>'20230003','cantidad_comprada'=>1,'costo_compra'=>150],
            ['insumo'=>'LÁMPARAS','lote'=>'20230001','cantidad_comprada'=>2,'costo_compra'=>73.6842105263158],
            ['insumo'=>'MAQUINA ROLADORA PARA CORTINAS','lote'=>'20230001','cantidad_comprada'=>1,'costo_compra'=>21667.22],
            ['insumo'=>'MATERIALES DE OFICINA','lote'=>'20230001','cantidad_comprada'=>1,'costo_compra'=>154.242424242424],
            ['insumo'=>'MOTOR CENTRAL PARA PUERTAS','lote'=>'20230001','cantidad_comprada'=>90,'costo_compra'=>16290],
            ['insumo'=>'MOTOR PUERTA CORREDERA MARCA ZKTECO','lote'=>'20230002','cantidad_comprada'=>5,'costo_compra'=>1117.5],
            ['insumo'=>'MOTOR PUERTA DESLIZANTE MARCA WEJOIN','lote'=>'20230002','cantidad_comprada'=>8,'costo_compra'=>1882.08],
            ['insumo'=>'MUESTRAS DE CHINA','lote'=>'20230001','cantidad_comprada'=>1,'costo_compra'=>1030.24],
            ['insumo'=>'PASADOR SIN RANURA DOBLADO','lote'=>'20230001','cantidad_comprada'=>200,'costo_compra'=>292],
            ['insumo'=>'PLUMA HIDRAULICA','lote'=>'20230001','cantidad_comprada'=>1,'costo_compra'=>762.22],
            ['insumo'=>'PUERTA ALMACÉN','lote'=>'20230003','cantidad_comprada'=>1,'costo_compra'=>217.39],
            ['insumo'=>'PUERTA BAÑO','lote'=>'20230003','cantidad_comprada'=>1,'costo_compra'=>215.48],
            ['insumo'=>'PUERTA DE GARAGE COLOR BLANCO 10X8 ESTILO AMERICANA CUADRADO CORTO','lote'=>'20230002','cantidad_comprada'=>12,'costo_compra'=>12109.68],
            ['insumo'=>'PUERTA DE GARAGE COLOR BLANCO 10X8 ESTILO AMERICANA LISA','lote'=>'20230002','cantidad_comprada'=>6,'costo_compra'=>5539.5],
            ['insumo'=>'PUERTA DE GARAGE COLOR BLANCO 12X8 ESTILO AMERICANA CUADRADO CORTO','lote'=>'20230002','cantidad_comprada'=>4,'costo_compra'=>4599.48],
            ['insumo'=>'PULIDORA','lote'=>'20230002','cantidad_comprada'=>1,'costo_compra'=>81.33],
            ['insumo'=>'SIERRA DE PÉNDULO','lote'=>'20230001','cantidad_comprada'=>1,'costo_compra'=>654.11],
            ['insumo'=>'CREMALLERA DENTADA DE ACERO ZINCADO 1MT','lote'=>'20230002','cantidad_comprada'=>150,'costo_compra'=>2070],
            ['insumo'=>'TALADRO','lote'=>'20230002','cantidad_comprada'=>2,'costo_compra'=>257.84],
            ['insumo'=>'TAQUETES','lote'=>'20230001','cantidad_comprada'=>1000,'costo_compra'=>585.306666666667],
            ['insumo'=>'TORNILLOS DMT','lote'=>'20230001','cantidad_comprada'=>1000,'costo_compra'=>585.306666666667],
            ['insumo'=>'TRANSPALETA HIDRAULICA','lote'=>'20230001','cantidad_comprada'=>1,'costo_compra'=>841.61],
            ['insumo'=>'TV LED 32 HIBRIDO', 'unidad_de_med','lote'=>'20230001','cantidad_comprada'=>1,'costo_compra'=>339],
            
        ];

        $im = new \App\Models\Productos\InsumosModel();
        $ipm = new \App\Models\Productos\InsumoProveedoresModel();
        $clm = new \App\Models\Productos\ComprasLoteModel();

        foreach ($compras as $key => $value) {
            // echo $value['insumo'];
            
            $id = $im->where('nombre',$value['insumo'])->first()['id'];
            $compras[$key]['id_insumo'] = $ipm->where('id_insumo',$id)->first()['id'];
            $compras[$key]['id_lote'] = $clm->where('factura',$value['lote'])->first()['id'];;

            unset($compras[$key]['insumo']);
            unset($compras[$key]['lote']);
        }

        saveIfDup( $ci, $compras, ['id_insumo','id_lote'] );

       
    }
}
