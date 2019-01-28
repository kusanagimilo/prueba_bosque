<script>

    var json = InformacionTratamiento(<?php echo $_POST['idtratamiento']; ?>);
    $("#descuento").val(json[0].descuento);
    $("#valor_tratamiento").val(json[0].valor_tratamiento);
    $("#nombre_tratamiento").val(json[0].nombre_tratamiento);

    $('#frm_edt_tratamiento').validate({
        rules: {
            nombre_tratamiento: {required: true},
            valor_tratamiento: {required: true},
            descuento: {required: true}
        },
        messages: {
            nombre_tratamiento: {required: 'Ingrese el nombre del tratamiento.'},
            valor_tratamiento: {required: 'Ingrese el valor de el tratamiento.'},
            descuento: {required: 'seleccione el descuento.'}
        },
        debug: true,
        invalidHandler: function () {

            alert('Hay información en el formulario sin diligenciar por favor completarla');
            return false;
        },
        submitHandler: function (form) {
            EditarTratamiento(json[0].idtratamiento);
        }
    });
</script>

<div class="panel panel-default">

    <div class="panel-heading">
        <h3 class="panel-title">Editar tratamiento</h3>
    </div>
    <div class="panel-body" >
        <form id="frm_edt_tratamiento">
            <table class="table table-bordered table-striped">

                <tr>
                    <td>Ingrese el nombre del tratamiento</td>
                    <td><input type="text" id="nombre_tratamiento" name="nombre_tratamiento"></td>
                </tr>
                <tr>
                    <td>Ingrese el valor de el tratamiento</td>
                    <td><input type="text" id="valor_tratamiento" name="valor_tratamiento"></td>
                </tr>
                <tr>
                    <td>Tiene descuento</td>
                    <td>
                        <select id="descuento" name="descuento">
                            <option value="">--seleccione--</option>
                            <option value="1">SI</option>
                            <option value="0">NO</option>
                        </select>
                    </td>
                </tr>
                <td colspan="2"><center>

                    <button id="btoGuardarPaciente" name="btoGuardarPaciente" class="btn btn-success" type="submit" >Guardar</button>
                </center></td>
                </tr>
            </table>
        </form>
    </div>
</div>

