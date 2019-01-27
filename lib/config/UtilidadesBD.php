<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of UtilidadesBD
 *
 * @author Antares
 */
require_once 'BD.php';

class UtilidadesBD {

    public function ValidarExiste($tabla, $campo, $valor) {
        try {
            $cc = BD::getInstance();
            $sql = "SELECT count(*) FROM " . $tabla . " WHERE " . $campo . "=:valor ";
            $result = $cc->db->prepare($sql);
            $params = array("valor" => $valor);
            $result->execute($params);
            $affected_rows = $result->fetchColumn();
            return ($affected_rows);
        } catch (PDOException $e) {
            return "error en la consulta";
        }
    }

    public function Datos($sentencia, $parametros) {
        try {

            $cc = BD::getInstance();
            $result = $cc->db->prepare($sentencia);
            if ($parametros == NULL) {
                $result->execute();
            } else {
                $result->execute($parametros);
            }
            $arreglo = $result->fetchAll(PDO::FETCH_ASSOC);
            return $arreglo;
        } catch (PDOException $e) {
            return "error en la consulta";
        }
    }

    public function Insertar($tabla, $campos, $valores) {
        try {
            $cc = BD::getInstance();
            $sentencia = "INSERT INTO " . $tabla . "(";
            foreach ($campos as $key => $value) {
                $sentencia .= $value . ",";
            }
            $sentencia = substr($sentencia, 0, -1);
            $sentencia .= ")VALUES(";
            foreach ($campos as $key => $value) {
                $sentencia .= ":" . $value . ",";
            }
            $sentencia = substr($sentencia, 0, -1);
            $sentencia .= ")";

            $result = $cc->db->prepare($sentencia);
            $result->execute($valores);

            return "ingreso";
        } catch (PDOException $e) {
            return "error";
        }
    }

    public function Editar($tabla, $campos, $valores, $campo_identificador) {
        try {
            $cc = BD::getInstance();

            $sentencia = "UPDATE " . $tabla . " SET ";
            foreach ($campos as $key => $value) {
                $sentencia .= $value . "=:" . $value . ",";
            }
            $sentencia = substr($sentencia, 0, -1);
            $sentencia .= " WHERE " . $campo_identificador . " = :" . $campo_identificador . "";

            $result = $cc->db->prepare($sentencia);
            $result->execute($valores);

            return "edito";
        } catch (PDOException $e) {
            return "error";
        }
    }

}
