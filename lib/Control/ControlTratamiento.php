<?php

require_once '../Modelo/Tratamiento.php';
$obj_tratamiento = new Tratamiento();
$opcion = $_POST['opcion'];
$retorno;
switch ($opcion) {
    case 'CrearTratamiento':
        $retorno = $obj_tratamiento->CrearTratamiento($_POST);
        echo $retorno;
        break;
    case 'EliminarTratamiento':
        $retorno = $obj_tratamiento->EliminarTratamiento($_POST);
        echo $retorno;
        break;
    case 'ListarTratamientos':
        $retorno = $obj_tratamiento->ListarTratamientos("");
        echo $retorno;
        break;
    case 'EditarTratamiento':
        $retorno = $obj_tratamiento->EditarTratamiento($_POST);
        echo $retorno;
        break;
    case 'SelectTratamientos':
        $retorno = $obj_tratamiento->SelectTratamientos("");
        echo $retorno;
        break;
    case 'InformacionTratamiento':
        $retorno = $obj_tratamiento->InformacionTratamiento($_POST);
        echo $retorno;
        break;
}


