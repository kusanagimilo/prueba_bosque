<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Paciente
 *
 * @author Antares
 */
require_once '../config/UtilidadesBD.php';

class Paciente {

    public function CrearPaciente($data) {

        $utilidades = new UtilidadesBD();
        $existe = $utilidades->ValidarExiste('paciente', 'numero_documento', $data['numero_documento']);

        if ($existe > 0) {
            return 2;
        } else {
            /* campos de la tabla */
            $campos = array('nombres',
                'apellidos',
                'tipo_documento',
                'numero_documento',
                'ciudad_residencia',
                'direccion',
                'telefono');
            /* valores que llegan desde el control */
            $valores = array('nombres' => $data['nombres'],
                'apellidos' => $data['apellidos'],
                'tipo_documento' => $data['tipo_documento'],
                'numero_documento' => $data['numero_documento'],
                'ciudad_residencia' => $data['ciudad_residencia'],
                'direccion' => $data['direccion'],
                'telefono' => $data['telefono']);
            $retorno = $utilidades->Insertar('paciente', $campos, $valores);
            if ($retorno == "error") {
                return 3;
            } else if ($retorno == 'ingreso') {
                return 1;
            }
        }
    }

    public function ListarPacientesGrid($data) {
        $utilidades = new UtilidadesBD();
        $sentencia = "SELECT nombres,apellidos,tipo_documento,numero_documento,ciudad_residencia,direccion,telefono FROM paciente";
        $parametros = NUll;
        $arreglo = $utilidades->Datos($sentencia, $parametros);
        $json = json_encode($arreglo);
        return $json;
    }

    public function InformacionPaciente($data) {
        $utilidades = new UtilidadesBD();
        $sentencia = "SELECT idpaciente,nombres,apellidos,tipo_documento,numero_documento,ciudad_residencia,direccion,telefono 
                      FROM paciente WHERE tipo_documento=:tipo_documento AND numero_documento=:numero_documento";
        $parametros = array('tipo_documento' => $data['tipo_documento'], 'numero_documento' => $data['numero_documento']);
        $arreglo = $utilidades->Datos($sentencia, $parametros);
        $json = json_encode($arreglo);
        return $json;
    }

    public function CrearTratamientoPaciente($data) {
        $utilidades = new UtilidadesBD();
        /* campos de la tabla */
        $campos = array('idtratamiento',
            'idpaciente',
            'valor');
        /* valores que llegan desde el control */
        $valores = array('idtratamiento' => (int)$data['idtratamiento'],
            'idpaciente' => (int)$data['idpaciente'],
            'valor'=>(double)$data['valor']);
        //return var_dump($valores);
        $retorno = $utilidades->Insertar('paciente_tratamiento', $campos, $valores);
        if ($retorno == "error") {
            return 3;
        } else if ($retorno == 'ingreso') {
            return 1;
        }
    }

}
