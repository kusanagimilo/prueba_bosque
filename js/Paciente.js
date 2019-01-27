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