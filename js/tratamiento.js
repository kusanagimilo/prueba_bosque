function GridTratamientos() {
    var data;
    $.ajax({
        type: "POST",
        url: "lib/Vista/GridTratamientos.php",
        async: false,
        success: function (retu) {
            data = retu;
        }
    });

    $("#contenido").html(data);
}
function ListarTratamientos() {
    var data;
    $.ajax({
        type: "POST",
        url: "lib/Control/ControlTratamiento.php",
        async: false,
        dataType: 'json',
        data: {
            opcion: 'ListarTratamientos'
        },
        success: function (retu) {
            data = retu;
        }
    });
    return data;
}
function DialogCrearTratamiento() {
    var data;

    $.ajax({
        type: "POST",
        url: 'lib/Vista/CrearTratamiento.php',
        async: false,
        success: function (retu) {
            data = retu;
        }
    });

    $("#dialog_n_tratamiento").html(data);
    $("#dialog_n_tratamiento").dialog({
        width: '500',
        height: '500',
        title: 'Crear tratamiento',
        modal: true,
        buttons: {
            "Cerrar": function ()
            {
                $("#dialog_n_tratamiento").dialog('close');
                $("#dialog_n_tratamiento").dialog('destroy');
                $("#dialog_n_tratamiento").html("");
            }
        }
    });

}

function CrearTratamiento() {

    var data;
    $.ajax({
        type: "POST",
        url: "lib/Control/ControlTratamiento.php",
        async: false,
        data: {
            opcion: 'CrearTratamiento',
            nombre_tratamiento: $("#nombre_tratamiento").val(),
            valor_tratamiento: $("#valor_tratamiento").val(),
            descuento: $("#descuento").val()
        },
        success: function (retu) {
            data = retu;
        }
    });
    if (data == 1) {
        alert("Se ingreso correctamente el tratamiento");
        $("#dialog_n_tratamiento").dialog('close');
        $("#dialog_n_tratamiento").dialog('destroy');
        $("#dialog_n_tratamiento").html("");
        GridTratamientos();

    } else if (data == 2) {
        alert("El tratamiento ya existe cambielo");
    } else if (data == 3) {
        alert("Error al tratar de almacenar el tratamiento");
    }
}

