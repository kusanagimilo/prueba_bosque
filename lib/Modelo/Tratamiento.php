<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Tratamiento
 *
 * @author Antares
 */
require_once '../config/UtilidadesBD.php';

class Tratamiento {

    public function CrearTratamiento($data) {
        $utilidades = new UtilidadesBD();
        $existe = $utilidades->ValidarExiste('tratamiento', 'nombre_tratamiento', $data['nombre_tratamiento']);
        if ($existe > 0) {
            return 2;
        } else {
            /* campos de la tabla */
            $campos = array('nombre_tratamiento',
                'valor_tratamiento',
                'descuento',
                'estado');
            /* valores que llegan desde el control */
            $valores = array('nombre_tratamiento' => $data['nombre_tratamiento'],
                'valor_tratamiento' => $data['valor_tratamiento'],
                'descuento' => $data['descuento'],
                'estado' => 1);
            $retorno = $utilidades->Insertar('tratamiento', $campos, $valores);
            if ($retorno == "error") {
                return 3;
            } else if ($retorno == 'ingreso') {
                return 1;
            }
        }
    }

    public function EliminarTratamiento($param) {
        
    }

    public function EditarTratamiento($data) {
        $utilidades = new UtilidadesBD();
        $campos = array('nombre_tratamiento',
            'valor_tratamiento',
            'descuento');

        $valores = array('idtratamiento' => $data['idtratamiento'],
            'nombre_tratamiento' => $data['nombre_tratamiento'],
            'valor_tratamiento' => $data['valor_tratamiento'],
            'descuento' => $data['descuento']);
        $retorno = $utilidades->Editar('tratamiento', $campos, $valores, 'idtratamiento');

        return $retorno;
    }

    public function ListarTratamientos($data) {

        $arreglo_retorno = array();

        $utilidades = new UtilidadesBD();
        $sentencia = "SELECT idtratamiento,nombre_tratamiento,valor_tratamiento,descuento,estado FROM tratamiento WHERE estado=:estado";
        $parametros = array('estado' => 1);
        $arreglo = $utilidades->Datos($sentencia, $parametros);

        foreach ($arreglo as $key => $value) {
            $descuento = "";
            if ($value['descuento'] == 1) {
                $descuento = 'si';
            } else if ($value['descuento'] == 0) {
                $descuento = 'no';
            }
            $arreglo_interior = array($value['nombre_tratamiento'],
                $value['valor_tratamiento'],
                $descuento,
                "<input type='button' class='btn btn-default' value='Editar' onclick='EditarTratamiento(" . $value['idtratamiento'] . ")'>",
                "<input type='button' class='btn btn-danger' value='Eliminar'>");
            array_push($arreglo_retorno, $arreglo_interior);
        }

        $json = json_encode($arreglo_retorno);

        return $json;
    }

}

/*
$data = array('idtratamiento' => 1,
    'nombre_tratamiento' => 'camilo',
    'valor_tratamiento' => 54154,
    'descuento' => 1);

$objp = new Tratamiento();
$retorno = $objp->EditarTratamiento($data);

echo $retorno;*/
