<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

helper('common');

class InsumosProveedorSeeder extends Seeder
{
    public function run()
    {
        $ipm = new \App\Models\Productos\InsumoProveedoresModel();

        // Array de usuarios
        $insumosProv = [
            ['insumo'=>'Acero de lama','id_proveedor'=>1,'modelo_proveedor'=>'ACERO GALVANIZADO PINTRO BL.','descripcion'=>'ACERO GALVANIZADO PINTRO BL.'],
            ['insumo'=>'Planchuela','id_proveedor'=>1,'modelo_proveedor'=>'Planchuela','descripcion'=>'Planchuela'],
            ['insumo'=>'Lama terminal','id_proveedor'=>1,'modelo_proveedor'=>'ANGULO BATIENTE 6MTS','descripcion'=>'ANGULO BATIENTE 6MTS'],
            ['insumo'=>'Armella','id_proveedor'=>1,'modelo_proveedor'=>'ARMELLA PARA SOLDAR SIN PATA','descripcion'=>'ARMELLA PARA SOLDAR SIN PATA'],
            ['insumo'=>'BARRA VEHICULAR DOBLE DIRECCIÓN','id_proveedor'=>1,'modelo_proveedor'=>'BARRA VEHICULAR DOBLE DIRECCIÓN','descripcion'=>'BARRA VEHICULAR DOBLE DIRECCIÓN'],
            ['insumo'=>'BARRA VEHICULAR DOBLE DIRECCIÓN CON PLUMA','id_proveedor'=>1,'modelo_proveedor'=>'BARRA VEHICULAR DOBLE DIRECCIÓN CON PLUMA','descripcion'=>'BARRA VEHICULAR DOBLE DIRECCIÓN CON PLUMA'],
            ['insumo'=>'BARRENAS, CINTA Y DISCOS','id_proveedor'=>1,'modelo_proveedor'=>'BARRENAS, CINTA Y DISCOS','descripcion'=>'BARRENAS, CINTA Y DISCOS'],
            ['insumo'=>'BURÓ','id_proveedor'=>1,'modelo_proveedor'=>'BURÓ','descripcion'=>'BURÓ'],
            ['insumo'=>'BUTACAS','id_proveedor'=>1,'modelo_proveedor'=>'BUTACAS','descripcion'=>'BUTACAS'],
            ['insumo'=>'CÁMARAS DE SEGURIDAD','id_proveedor'=>1,'modelo_proveedor'=>'CÁMARAS DE SEGURIDAD','descripcion'=>'CÁMARAS DE SEGURIDAD'],
            ['insumo'=>'Carrilera','id_proveedor'=>1,'modelo_proveedor'=>'CARRILERA CAL16 NEGRA 7CM*11/2','descripcion'=>'CARRILERA CAL16 NEGRA 7CM*11/2'],
            ['insumo'=>'Cerradura','id_proveedor'=>2,'modelo_proveedor'=>'CERRADURAS - CHINA','descripcion'=>'CERRADURAS - CHINA'],
            ['insumo'=>'CHAPAS','id_proveedor'=>1,'modelo_proveedor'=>'CHAPAS','descripcion'=>'CHAPAS'],
            ['insumo'=>'CINTAS DE MEDIR','id_proveedor'=>1,'modelo_proveedor'=>'CINTAS DE MEDIR','descripcion'=>'CINTAS DE MEDIR'],
            ['insumo'=>'COMPRESOR Y TALADRO DE PISO','id_proveedor'=>1,'modelo_proveedor'=>'COMPRESOR Y TALADRO DE PISO','descripcion'=>'COMPRESOR Y TALADRO DE PISO'],
            ['insumo'=>'DISCOS DE CORTE','id_proveedor'=>1,'modelo_proveedor'=>'DISCOS DE CORTE','descripcion'=>'DISCOS DE CORTE'],
            ['insumo'=>'DISPENSADOR DE AGUA','id_proveedor'=>1,'modelo_proveedor'=>'DISPENSADOR DE AGUA','descripcion'=>'DISPENSADOR DE AGUA'],
            ['insumo'=>'JALADERAS - CHINA','id_proveedor'=>2,'modelo_proveedor'=>'JALADERAS - CHINA','descripcion'=>'JALADERAS - CHINA'],
            ['insumo'=>'KIT DE ALARMA','id_proveedor'=>1,'modelo_proveedor'=>'KIT DE ALARMA','descripcion'=>'KIT DE ALARMA'],
            ['insumo'=>'KIT DE AUTOMATIZACION PUERTAS CORREDIZAS RC1000','id_proveedor'=>1,'modelo_proveedor'=>'KIT DE AUTOMATIZACION PUERTAS CORREDIZAS RC1000','descripcion'=>'KIT DE AUTOMATIZACION PUERTAS CORREDIZAS RC1000'],
            ['insumo'=>'KIT DE SEGURIDAD','id_proveedor'=>1,'modelo_proveedor'=>'KIT DE SEGURIDAD','descripcion'=>'KIT DE SEGURIDAD'],
            ['insumo'=>'LÁMPARAS','id_proveedor'=>1,'modelo_proveedor'=>'LÁMPARAS','descripcion'=>'LÁMPARAS'],
            ['insumo'=>'Patin','id_proveedor'=>1,'modelo_proveedor'=>'LATERAL EUROPLANA','descripcion'=>'LATERAL EUROPLANA'],
            ['insumo'=>'MAQUINA ROLADORA PARA CORTINAS','id_proveedor'=>1,'modelo_proveedor'=>'MAQUINA ROLADORA PARA CORTINAS','descripcion'=>'MAQUINA ROLADORA PARA CORTINAS'],
            ['insumo'=>'MATERIALES DE OFICINA','id_proveedor'=>1,'modelo_proveedor'=>'MATERIALES DE OFICINA','descripcion'=>'MATERIALES DE OFICINA'],
            ['insumo'=>'MOTOR CENTRAL PARA PUERTAS','id_proveedor'=>1,'modelo_proveedor'=>'MOTOR CENTRAL PARA PUERTAS','descripcion'=>'MOTOR CENTRAL PARA PUERTAS'],
            ['insumo'=>'MOTOR PUERTA CORREDERA MARCA ZKTECO','id_proveedor'=>1,'modelo_proveedor'=>'MOTOR PUERTA CORREDERA MARCA ZKTECO','descripcion'=>'MOTOR PUERTA CORREDERA MARCA ZKTECO'],
            ['insumo'=>'MOTOR PUERTA DESLIZANTE MARCA WEJOIN','id_proveedor'=>1,'modelo_proveedor'=>'MOTOR PUERTA DESLIZANTE MARCA WEJOIN','descripcion'=>'MOTOR PUERTA DESLIZANTE MARCA WEJOIN'],
            ['insumo'=>'MUESTRAS DE CHINA','id_proveedor'=>2,'modelo_proveedor'=>'MUESTRAS DE CHINA','descripcion'=>'MUESTRAS DE CHINA'],
            ['insumo'=>'PASADOR SIN RANURA DOBLADO','id_proveedor'=>1,'modelo_proveedor'=>'PASADOR SIN RANURA DOBLADO','descripcion'=>'PASADOR SIN RANURA DOBLADO'],
            ['insumo'=>'Plato','id_proveedor'=>1,'modelo_proveedor'=>'PLATO LATERAL','descripcion'=>'PLATO LATERAL'],
            ['insumo'=>'PLUMA HIDRAULICA','id_proveedor'=>1,'modelo_proveedor'=>'PLUMA HIDRAULICA','descripcion'=>'PLUMA HIDRAULICA'],
            ['insumo'=>'Bombo','id_proveedor'=>1,'modelo_proveedor'=>'POLEA 1 1/2 CON BARRILITO','descripcion'=>'POLEA 1 1/2 CON BARRILITO'],
            ['insumo'=>'PUERTA ALMACÉN','id_proveedor'=>1,'modelo_proveedor'=>'PUERTA ALMACÉN','descripcion'=>'PUERTA ALMACÉN'],
            ['insumo'=>'PUERTA BAÑO','id_proveedor'=>1,'modelo_proveedor'=>'PUERTA BAÑO','descripcion'=>'PUERTA BAÑO'],
            ['insumo'=>'PUERTA DE GARAGE COLOR BLANCO 10X8 ESTILO AMERICANA CUADRADO CORTO','id_proveedor'=>1,'modelo_proveedor'=>'PUERTA DE GARAGE COLOR BLANCO 10X8 ESTILO AMERICANA CUADRADO CORTO','descripcion'=>'PUERTA DE GARAGE COLOR BLANCO 10X8 ESTILO AMERICANA CUADRADO CORTO'],
            ['insumo'=>'PUERTA DE GARAGE COLOR BLANCO 10X8 ESTILO AMERICANA LISA','id_proveedor'=>1,'modelo_proveedor'=>'PUERTA DE GARAGE COLOR BLANCO 10X8 ESTILO AMERICANA LISA','descripcion'=>'PUERTA DE GARAGE COLOR BLANCO 10X8 ESTILO AMERICANA LISA'],
            ['insumo'=>'PUERTA DE GARAGE COLOR BLANCO 12X8 ESTILO AMERICANA CUADRADO CORTO','id_proveedor'=>1,'modelo_proveedor'=>'PUERTA DE GARAGE COLOR BLANCO 12X8 ESTILO AMERICANA CUADRADO CORTO','descripcion'=>'PUERTA DE GARAGE COLOR BLANCO 12X8 ESTILO AMERICANA CUADRADO CORTO'],
            ['insumo'=>'PULIDORA','id_proveedor'=>1,'modelo_proveedor'=>'PULIDORA','descripcion'=>'PULIDORA'],
            ['insumo'=>'Remache','id_proveedor'=>1,'modelo_proveedor'=>'REMACHE N.3','descripcion'=>'REMACHE N.3'],
            ['insumo'=>'Resorte','id_proveedor'=>1,'modelo_proveedor'=>'RESORTE 40CM','descripcion'=>'RESORTE 40CM'],
            ['insumo'=>'SIERRA DE PÉNDULO','id_proveedor'=>1,'modelo_proveedor'=>'SIERRA DE PÉNDULO','descripcion'=>'SIERRA DE PÉNDULO'],
            ['insumo'=>'Soporte','id_proveedor'=>1,'modelo_proveedor'=>'SOPORTE DE GUÍA','descripcion'=>'SOPORTE DE GUÍA'],
            ['insumo'=>'CREMALLERA DENTADA DE ACERO ZINCADO 1MT','id_proveedor'=>1,'modelo_proveedor'=>'SUMINISTRO DE CREMALLERA DENTADA DE ACERO ZINCADO 1MT','descripcion'=>'SUMINISTRO DE CREMALLERA DENTADA DE ACERO ZINCADO 1MT'],
            ['insumo'=>'TALADRO','id_proveedor'=>1,'modelo_proveedor'=>'TALADRO','descripcion'=>'TALADRO'],
            ['insumo'=>'TAQUETES','id_proveedor'=>1,'modelo_proveedor'=>'TAQUETES','descripcion'=>'TAQUETES'],
            ['insumo'=>'Tornillo M6 Cabeza lisa','id_proveedor'=>1,'modelo_proveedor'=>'TORNILLOS M6 CABEZA LISA','descripcion'=>'TORNILLOS M6 CABEZA LISA'],
            ['insumo'=>'Tornillo M8 2-1/2','id_proveedor'=>1,'modelo_proveedor'=>'TORNILLOS M8 2-1/2','descripcion'=>'TORNILLOS M8 2-1/2'],
            ['insumo'=>'Tornillo M8 1','id_proveedor'=>1,'modelo_proveedor'=>'TORNILLOS M8 1','descripcion'=>'TORNILLOS M8 1'],
            ['insumo'=>'TORNILLOS DMT','id_proveedor'=>1,'modelo_proveedor'=>'TORNILLOS DMT','descripcion'=>'TORNILLOS DMT'],
            ['insumo'=>'TRANSPALETA HIDRAULICA','id_proveedor'=>1,'modelo_proveedor'=>'TRANSPALETA HIDRAULICA','descripcion'=>'TRANSPALETA HIDRAULICA'],
            ['insumo'=>'Eje','id_proveedor'=>1,'modelo_proveedor'=>'TUBO GUÍA 1 1/2 3MTS','descripcion'=>'TUBO GUÍA 1 1/2 3MTS'],
            ['insumo'=>'TV LED 32 HIBRIDO','id_proveedor'=>1,'modelo_proveedor'=>'TV LED 32 HIBRIDO','descripcion'=>'TV LED 32 HIBRIDO'],
            
        ];

        $im = new \App\Models\Productos\InsumosModel();

        foreach($insumosProv as $key => $insumoProv){
            $insumosProv[$key]['id_insumo'] = $im->where('nombre', $insumoProv['insumo'])->first()['id'];
            unset($insumosProv[$key]['insumo']);
        }

        saveIfDup( $ipm, $insumosProv, ['id_insumo'] );

       
    }
}
