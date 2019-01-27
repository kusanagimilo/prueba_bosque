<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
        <link href="css/bootstrap-3.3.7/css/bootstrap.css" rel="stylesheet" id="bootstrap-css">
        <script src="js/jquery.js"></script>
        <script src="css/bootstrap-3.3.7/js/bootstrap.js"></script>
        <link href="css/jquery.dataTables.css" rel="stylesheet" id="bootstrap-css">
        <link href="js/jquery-ui-1.11.4.custom/jquery-ui.css" rel="stylesheet" id="bootstrap-css">
        <script src="js/jquery-ui-1.11.4.custom/jquery-ui.js"></script>
        <script src="js/jquery.dataTables.js"></script>
        <script src="js/Paciente.js"></script>
        <script src="js/tratamiento.js"></script>
        <script src="js/jquery_validate.js"></script>
        <script src="js/select2/select2.js"></script>
        <link href="js/select2/select2.css" rel="stylesheet" id="bootstrap-css">
        <style>
            body{margin-top:50px;}
            .glyphicon { margin-right:10px; }
            .panel-body { padding:0px; }
            .panel-body table tr td { padding-left: 15px }
            .panel-body .table {margin-bottom: 0px; }
        </style>
    </head>
    <body>

        <div class="row" style="margin: 6px 6px 6px 6px;">
            <div class="col-sm-3 col-md-3">
                <div class="panel-group" id="accordion">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h4 class="panel-title">
                                <a data-toggle="collapse" data-parent="#accordion" href="#collapseOne"><span class="glyphicon glyphicon-user">
                                    </span>Pacientes</a>
                            </h4>
                        </div>
                        <div id="collapseOne" class="panel-collapse collapse in">
                            <div class="panel-body">
                                <table class="table">
                                    <tr>
                                        <td>
                                            <span class="glyphicon glyphicon-plus"></span><a href="#" onclick="FormCrearPaciente()">Crear paciente</a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <span class="glyphicon glyphicon-th-list"></span><a href="#" onclick="ListarPacientesGrid()">Ver pacientes registrados</a>
                                        </td>
                                    </tr>
                                </table>
                            </div>
                        </div>
                    </div>
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h4 class="panel-title">
                                <a data-toggle="collapse" data-parent="#accordion" href="#collapseTwo"><span class="glyphicon glyphicon-flash">
                                    </span>Tratamientos</a>
                            </h4>
                        </div>
                        <div id="collapseTwo" class="panel-collapse collapse">
                            <div class="panel-body">
                                <table class="table">
                                    <tr>
                                        <td>
                                            <span class="glyphicon glyphicon-plus"></span><a href="#" onclick="GridTratamientos()">Administracion tratamientos</a>
                                        </td>
                                    </tr>

                                </table>
                            </div>
                        </div>
                    </div>


                </div>
            </div>
            <div class="col-sm-9 col-md-9">
                <div class="well" id="contenido">



                </div>
            </div>
        </div>


    </body>
</html>