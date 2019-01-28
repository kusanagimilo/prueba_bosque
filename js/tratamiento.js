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

function SelectTratamientos() {
    var data;
    $.ajax({
        type: "POST",
        url: "lib/Control/ControlTratamiento.php",
        async: false,
        dataType: 'json',
        data: {
            opcion: 'SelectTratamientos'
        },
        success: function (retu) {
            data = retu;
        }
    });

    $("#tratamiento").html("");
    $("#tratamiento").append("<option value=''>--seleccione--</option>");
    $.each(data, function (key, datos) {
        $("#tratamiento").append("<option value='" + datos.idtratamiento + "'>" + datos.nombre_tratamiento + "</option>");
    });
    $("#tratamiento").select2();
}

function InformacionTratamiento(idtratamiento) {
    var data;
    $.ajax({
        type: "POST",
        url: "lib/Control/ControlTratamiento.php",
        async: false,
        dataType: 'json',
        data: {
            opcion: 'InformacionTratamiento',
            idtratamiento: idtratamiento
        },
        success: function (retu) {
            data = retu;
        }
    });

    return data;
}
function ValorTratamiento() {

    var idtratamiento = $("#tratamiento").val();
    if (idtratamiento == "") {
        alert("Seleccione un tratamiento");
    } else {
        var bogota = ['Bogotá', 'Bogota', 'BOGOTA', 'BOGOTÁ', 'bogota', 'bogotá'];
        var json = InformacionTratamiento(idtratamiento);
        var ciudad = $.trim($("#ciudad_con").html());
        var indice = bogota.indexOf(ciudad);

        if (indice !== -1) {
            //cont_val_tra
            $("#cont_val_tra").html(json[0].valor_tratamiento + '<input type="hidden" value="' + json[0].valor_tratamiento + '" name="valor_tratamiento" id="valor_tratamiento">');

        } else {
            var html = "";
            if (json[0].descuento == 1) {
                var valor_tratamiento = parseInt(json[0].valor_tratamiento) - (parseInt(json[0].valor_tratamiento) * 0.10);
                html = "Descuento : SI | valor -10% = " + valor_tratamiento + '<input type="hidden" value="' + valor_tratamiento + '" name="valor_tratamiento" id="valor_tratamiento">';
                $("#cont_val_tra").html(html);
            } else if (json[0].descuento == 0) {

                html = "Descuento : NO | valor = " + json[0].valor_tratamiento + '<input type="hidden" value="' + json[0].valor_tratamiento + '" name="valor_tratamiento" id="valor_tratamiento">';
                $("#cont_val_tra").html(html);
            }

        }
    }
}
function EliminarTratamiento(idtratamiento) {

    var confirma = confirm("Esta seguro de realizar esta accion");

    if (confirma) {

        var data;
        $.ajax({
            type: "POST",
            url: "lib/Control/ControlTratamiento.php",
            async: false,
            data: {
                opcion: 'EliminarTratamiento',
                idtratamiento: idtratamiento
            },
            success: function (retu) {
                data = retu;
            }
        });
        if (data == 1) {
            alert("Se elimino correctamente el tratamiento");
            GridTratamientos()
        } else if (data == 3) {
            alert("Se produjo un error al tratar de eliminar");
        }
    }
}
function DialogModificarTratamiento(idtratamiento) {
    var data;

    $.ajax({
        type: "POST",
        url: 'lib/Vista/EditarTratamiento.php',
        async: false,
        data: {
            idtratamiento: idtratamiento
        },
        success: function (retu) {
            data = retu;
        }
    });

    $("#dialog_edt_tratamiento").html(data);
    $("#dialog_edt_tratamiento").dialog({
        width: '500',
        height: '500',
        title: 'Editar tratamiento',
        modal: true,
        buttons: {
            "Cerrar": function ()
            {
                $("#dialog_edt_tratamiento").dialog('close');
                $("#dialog_edt_tratamiento").dialog('destroy');
                $("#dialog_edt_tratamiento").html("");
            }
        }
    });

}

function EditarTratamiento(idtratamiento) {

    var confirma = confirm("Esta seguro de modificar la informacion");

    if (confirma) {

        var data;
        $.ajax({
            type: "POST",
            url: "lib/Control/ControlTratamiento.php",
            async: false,
            data: {
                opcion: 'EditarTratamiento',
                idtratamiento: idtratamiento,
                nombre_tratamiento: $("#nombre_tratamiento").val(),
                valor_tratamiento: $("#valor_tratamiento").val(),
                descuento: $("#descuento").val()
            },
            success: function (retu) {
                data = retu;
            }
        });
        if (data == 1) {
            alert("Se modifico correctamente el tratamiento");
            $("#dialog_edt_tratamiento").dialog('close');
            $("#dialog_edt_tratamiento").dialog('destroy');
            $("#dialog_edt_tratamiento").html("");
            GridTratamientos();
        } else if (data == 3) {
            alert("Error al tratar de modificar el tratamiento");
        }
    }
}