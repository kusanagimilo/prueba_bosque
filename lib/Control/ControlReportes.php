<?php

require_once '../Modelo/Reportes.php';
$obj_reportes = new Reportes();
$opcion = $_POST['opcion'];
$retorno;
switch ($opcion) {
    case 'CantidadIngresos':
        $retorno = $obj_reportes->CantidadIngresos($_POST);
        echo $retorno;
        break;
    case 'VisitasHospital':
        $retorno = $obj_reportes->VisitasHospital($_POST);
        echo $retorno;
        break;
    case 'RazonVisitaComun':
        $retorno = $obj_reportes->RazonVisitaComun("");
        echo $retorno;
        break;
}