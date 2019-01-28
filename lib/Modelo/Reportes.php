<?php

require_once '../config/UtilidadesBD.php';

class Reportes {

    public function CantidadIngresos($data) {
        $utilidades = new UtilidadesBD();
        $sentencia = "SELECT SUM(pactra.valor)as ingresos,tra.nombre_tratamiento,tra.idtratamiento
                      FROM paciente_tratamiento pactra
                      INNER JOIN tratamiento tra on tra.idtratamiento = pactra.idtratamiento
                      WHERE month(fecha_creacion)=:mes
                      AND year(fecha_creacion)=:anio
                      GROUP BY tra.idtratamiento
                      ORDER BY ingresos DESC";

        $parametros = array('mes' => $data['mes'], 'anio' => $data['anio']);
        $arreglo = $utilidades->Datos($sentencia, $parametros);
        $json = json_encode($arreglo);
        return $json;
    }

    public function VisitasHospital($data) {
        $utilidades = new UtilidadesBD();
        $sentencia = "SELECT COUNT(*) AS visitas,MONTHNAME(fecha_creacion) as mes
                      FROM paciente_tratamiento
                      WHERE year(fecha_creacion)=:anio 
                      GROUP BY mes
                      ORDER BY visitas DESC
                      LIMIT 3;";

        $parametros = array('anio' => $data['anio']);
        $arreglo = $utilidades->Datos($sentencia, $parametros);
        $json = json_encode($arreglo);
        return $json;
    }

    public function RazonVisitaComun($data) {
        $utilidades = new UtilidadesBD();
        $sentencia = "SELECT COUNT(*) AS n_visitas,tra.nombre_tratamiento,tra.idtratamiento
FROM paciente_tratamiento pactr
INNER JOIN tratamiento tra ON tra.idtratamiento = pactr.idtratamiento
GROUP BY tra.idtratamiento
ORDER BY n_visitas DESC;";

        $parametros = NULL;
        $arreglo = $utilidades->Datos($sentencia, $parametros);
        $json = json_encode($arreglo);
        return $json;
    }

}
