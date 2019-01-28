<?php
date_default_timezone_set("America/Bogota");
?>
<script>
    $('#frm_tra_paciente').validate({
        rules: {
            tratamiento: {required: true},
            valor_tratamiento: {required: true}
        },
        messages: {
            nombre_tratamiento: {required: 'Seleccione el tratamiento.'},
            valor_tratamiento: {required: 'Ingrese el valor de el tratamiento.'}

        },
        debug: true,
        invalidHandler: function () {

            alert('Hay información en el formulario sin diligenciar por favor completarla');
            return false;
        },
        submitHandler: function (form) {
            CrearTratamientoPaciente(<?php echo $_POST['idpaciente'];?>);
        }
    });
</script>
<form id="frm_tra_paciente">
    <table class="table table-bordered table-striped">

        <tr>
            <td>Paciente</td>
            <td><?php echo $_POST['nombres'] . " " . $_POST['apellidos']; ?></td>
        </tr>
        <tr>
            <td>Ciudad de residencia</td>
            <td><div id="ciudad_con"><?php echo $_POST['ciudad_residencia'] ?></div></td>
        </tr>
        <tr>
            <td>Fecha tratamiento</td>
            <td><?php echo date('Y-m-d H:i:s'); ?></td>
        </tr>
        <tr>
            <td>Seleccione el tratamiento</td>
            <td id="cont_tratamiento">
                <select id="tratamiento" name="tratamiento" style="width: 200px;" onchange="ValorTratamiento()">
                    <option value="">--seleccione--</option>
                </select>
            </td>
        </tr>
        <tr>
            <td>Valor tratamiento</td>
            <td id="cont_val_tra">
                <input type="hidden" value="" name="valor_tratamiento" id="valor_tratamiento">
            </td>
        </tr>
        <tr>
            <td colspan="2"><center>

            <button id="btoGuardarPaciente" name="btoGuardarPaciente" class="btn btn-success" type="submit" >Guardar</button>
        </center></td>
        </tr>
    </table>
</form>
<script>
    SelectTratamientos();
</script>


