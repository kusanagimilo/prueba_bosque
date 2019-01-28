function VistaCantidadIngresos() {
    var data;
    $.ajax({
        type: "POST",
        url: "lib/Vista/CantidadIngresos.php",
        async: false,
        success: function (retu) {
            data = retu;
        }
    });
    $("#contenido").html(data);
}

function InformeIngresos() {
    var anio = $("#anio").val();
    var mes = $("#mes").val();

    if (mes == "" || anio == "") {
        alert("Seleccione los filtros");
    } else {
        var data;
        $.ajax({
            type: "POST",
            url: "lib/Control/ControlReportes.php",
            async: false,
            dataType: 'json',
            data: {
                opcion: 'CantidadIngresos',
                mes: mes,
                anio: anio
            },
            success: function (retu) {
                data = retu;
            }
        });
        $("#ingresos_mes").html("");

        $.each(data, function (key, datos) {
            var fila = '<tr>' +
                    '<td>' + datos.nombre_tratamiento + '</td>' +
                    '<td>' + datos.ingresos + '</td>' +
                    '</tr>';
            $("#ingresos_mes").append(fila);
        });
    }
}
function VistaVisitasHospital() {
    var data;
    $.ajax({
        type: "POST",
        url: "lib/Vista/VisitaHospital.php",
        async: false,
        success: function (retu) {
            data = retu;
        }
    });
    $("#contenido").html(data);
}
function VisitasHospital() {
    var anio = $("#anio").val();

    if (anio == "") {
        alert("Seleccione los filtros");
    } else {
        var data;
        $.ajax({
            type: "POST",
            url: "lib/Control/ControlReportes.php",
            async: false,
            dataType: 'json',
            data: {
                opcion: 'VisitasHospital',
                anio: anio
            },
            success: function (retu) {
                data = retu;
            }
        });
        $("#visitas_hospital").html("");

        $.each(data, function (key, datos) {
            var fila = '<tr>' +
                    '<td>' + datos.mes + '</td>' +
                    '<td>' + datos.visitas + '</td>' +
                    '</tr>';
            $("#visitas_hospital").append(fila);
        });
    }
}
function VistaRazonVisitaComun() {
    var data;
    $.ajax({
        type: "POST",
        url: "lib/Vista/RazonVisitaComun.php",
        async: false,
        success: function (retu) {
            data = retu;
        }
    });
    $("#contenido").html(data);
}


function RazonVisitaComun() {
    var data;
    $.ajax({
        type: "POST",
        url: "lib/Control/ControlReportes.php",
        async: false,
        dataType: 'json',
        data: {
            opcion: 'RazonVisitaComun'
        },
        success: function (retu) {
            data = retu;
        }
    });
    $("#razon_visita_comun").html("");

    $.each(data, function (key, datos) {
        var fila = '<tr>' +
                '<td>' + datos.nombre_tratamiento + '</td>' +
                '<td>' + datos.n_visitas + '</td>' +
                '</tr>';
        $("#razon_visita_comun").append(fila);
    });
}