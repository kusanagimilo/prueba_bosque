<?php

require_once '../Modelo/Paciente.php';
$obj_paciente = new Paciente();
$opcion = $_POST['opcion'];
$retorno;
switch ($opcion) {
    case 'CrearPaciente':
        $retorno = $obj_paciente->CrearPaciente($_POST);
        echo $retorno;
        break;

    case 'ListarPacientesGrid':
        $retorno = $obj_paciente->ListarPacientesGrid(NULL);
        echo $retorno;
        break;
}






