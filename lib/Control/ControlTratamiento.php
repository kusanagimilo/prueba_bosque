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
        break;
    case 'ListarTratamientos':
        $retorno = $obj_tratamiento->ListarTratamientos("");
        echo $retorno;
        break;
    case 'EditarTratamiento':
        break;
}


