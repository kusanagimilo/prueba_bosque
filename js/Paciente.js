function FormCrearPaciente() {
    var data;
    $.ajax({
        type: "POST",
        url: "lib/Vista/CrearPaciente.php",
        async: false,
        success: function (retu) {
            data = retu;
        }
    });
    $("#contenido").html(data);
}

function CrearPaciente() {
    var data;
    $.ajax({
        type: "POST",
        url: "lib/Control/ControlPaciente.php",
        async: false,
        data: {
            opcion: 'CrearPaciente',
            nombres: $("#nombres").val(),
            apellidos: $("#apellidos").val(),
            tipo_documento: $("#tipo_documento").val(),
            numero_documento: $("#numero_documento").val(),
            ciudad_residencia: $("#ciudad_residencia").val(),
            direccion: $("#direccion").val(),
            telefono: $("#telefono").val()
        },
        success: function (retu) {
            data = retu;
        }
    });
    if (data == 1) {
        alert("Se ingreso correctamente el paciente");
        FormCrearPaciente();
    } else if (data == 2) {
        alert("El paciente ya existe cambielo");
    } else if (data == 3) {
        alert("Error al tratar de almacenar el paciente");
    }
}
function ListarPacientesGrid() {
    var data;
    $.ajax({
        type: "POST",
        url: "lib/Control/ControlPaciente.php",
        async: false,
        dataType: 'json',
        data: {
            opcion: 'ListarPacientesGrid'
        },
        success: function (retu) {
            data = retu;
        }
    });
    $("#contenido").html("");
    //console.log(data);
    var cabecera = '<div class="row" style="background-color: #cccccc">' +
            '<div class="col-md-2">Nombres</div>' +
            '<div class="col-md-2">Apellidos</div>' +
            '<div class="col-md-1">Tipo doc</div>' +
            '<div class="col-md-1">#Documento</div>' +
            '<div class="col-md-2">Ciudad</div>' +
            '<div class="col-md-2">Direccion</div>' +
            '<div class="col-md-1">Telefono</div>' +
            '</div>';
    $("#contenido").append(cabecera);
    $.each(data, function (key, datos) {
        var fila = '<div class="row">' +
                '<div class="col-md-2">' + datos.nombres + '</div>' +
                '<div class="col-md-2">' + datos.apellidos + '</div>' +
                '<div class="col-md-1">' + datos.tipo_documento + '</div>' +
                '<div class="col-md-1">' + datos.numero_documento + '</div>' +
                '<div class="col-md-2">' + datos.ciudad_residencia + '</div>' +
                '<div class="col-md-2">' + datos.direccion + '</div>' +
                '<div class="col-md-1">' + datos.telefono + '</div>' +
                '</div>';
        $("#contenido").append(fila);
    });

}

function TratamientoPaciente() {
    var data;
    $.ajax({
        type: "POST",
        url: "lib/Vista/TratamientoPaciente.php",
        async: false,
        success: function (retu) {
            data = retu;
        }
    });
    $("#contenido").html(data);
}


function InformacionPaciente(numero_documento, tipo_documento) {
    var data;
    $.ajax({
        type: "POST",
        url: "lib/Control/ControlPaciente.php",
        async: false,
        dataType: 'json',
        data: {
            opcion: 'InformacionPaciente',
            tipo_documento: tipo_documento,
            numero_documento: numero_documento
        },
        success: function (retu) {
            data = retu;
        }
    });

    return data;
}

function TratamientoPacienteForm() {

    var tipo_documento = $("#tipo_documento").val();
    var numero_documento = $("#numero_documento").val();

    if (tipo_documento == "" || numero_documento == "") {
        alert("Seleccione los filtros para realizar la busqueda");
    } else {
        var json = InformacionPaciente(numero_documento, tipo_documento);
        if (json.length == 0) {
            $("#forma_tratamiento_paciente").html("<div class='alert alert-danger' role='alert'>No se encontro el paciente</div>");
        } else if (json.length > 0) {

            var form;
            $.ajax({
                type: "POST",
                url: "lib/Vista/TratamientoPacienteForm.php",
                async: false,
                data: {
                    idpaciente: json[0].idpaciente,
                    nombres: json[0].nombres,
                    apellidos: json[0].apellidos,
                    ciudad_residencia: json[0].ciudad_residencia

                },
                success: function (retorno) {
                    form = retorno;
                }
            });
            $("#forma_tratamiento_paciente").html(form);
        }
    }

}

function CrearTratamientoPaciente(idpaciente) {
    var data;
    $.ajax({
        type: "POST",
        url: "lib/Control/ControlPaciente.php",
        async: false,
        data: {
            opcion: 'CrearTratamientoPaciente',
            idpaciente: $.trim(idpaciente),
            idtratamiento: $.trim($("#tratamiento").val()),
            valor: $("#valor_tratamiento").val()
        },
        success: function (retu) {
            data = retu;
        }
    });
    if (data == 1) {
        alert("Se ingreso correctamente el tratamiento para el paciente");
        TratamientoPacienteForm();
    } else if (data == 3) {
        alert("Error al tratar de almacenar el paciente");
    }
}
function Hover() {
    var data;
    $.ajax({
        type: "POST",
        url: "lib/Control/ControlPaciente.php",
        async: false,
        dataType: 'json',
        data: {
            opcion: 'ListarPacientesGrid'
        },
        success: function (retu) {
            data = retu;
        }
    });
    $("#contenido").html("");
    //console.log(data);
    var html = '<div style="overflow-x: auto;">' +
            '<table class="table table-hover">' +
            '<tr id="nombre_ap">' +
            '<td style="background-color: #cccccc">Nombre y apellidos</td>' +
            '</tr>' +
            '<tr id="documen">' +
            '<td style="background-color: #cccccc">Documento</td>' +
            '</tr>' +
            '<tr id="dire_tel">' +
            '<td style="background-color: #cccccc">Direccion y telefono</td>' +
            '</tr>' +
            '</table>' +
            '</div>';
    $("#contenido").html(html);
    $.each(data, function (key, datos) {
        var nombres_apelli = "<td>" + datos.nombres + " " + datos.apellidos + "</td>";
        var documento = "<td>" + datos.tipo_documento + " " + datos.numero_documento + "</td>";
        var dire_tel = "<td>" + datos.ciudad_residencia + " " + datos.direccion + " , " + datos.telefono + "</td>";

        $("#nombre_ap").append(nombres_apelli);
        $("#documen").append(documento);
        $("#dire_tel").append(dire_tel);
    });



}