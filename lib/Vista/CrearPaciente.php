<script>
    $('#frm_paciente').validate({
        rules: {
            nombres: {required: true},
            apellidos: {required: true},
            tipo_documento: {required: true},
            numero_documento: {required: true},
            ciudad_residencia: {required: true},
            direccion: {required: true},
            telefono: {required: true}
        },
        messages: {
            nombres: {required: 'Ingrese el nombre del paciente.'},
            apellidos: {required: 'Ingrese los apellidos del paciente.'},
            tipo_documento: {required: 'seleccione el tipo de documento.'},
            numero_documento: {required: 'Ingrese el numero del documento.'},
            ciudad_residencia: {required: 'Ingrese la ciudad de residencia.'},
            direccion: {required: 'Ingrese la direccion.'},
            telefono: {required: 'Ingrese el # telefonico.'}
        },
        debug: true,
        invalidHandler: function () {

            alert('Hay información en el formulario sin diligenciar por favor completarla');
            return false;
        },
        submitHandler: function (form) {
            CrearPaciente();
        }
    });
</script>

<div class="panel panel-default">

    <div class="panel-heading">
        <h3 class="panel-title">Nuevo paciente</h3>
    </div>
    <div class="panel-body" >
        <form id="frm_paciente">
            <table class="table table-bordered table-striped">

                <tr>
                    <td>Ingrese el nombre del paciente</td>
                    <td><input type="text" id="nombres" name="nombres"></td>
                </tr>
                <tr>
                    <td>Ingrese el apellido del paciente</td>
                    <td><input type="text" id="apellidos" name="apellidos"></td>
                </tr>
                <tr>
                    <td>Seleccione el tipo de documento</td>
                    <td>
                        <select id="tipo_documento" name="tipo_documento">
                            <option value="">--seleccione--</option>
                            <option value="C.C">C.C</option>
                            <option value="T.I">T.I</option>
                            <option value="C.E">C.E</option>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td>Ingrese el numero del documento</td>
                    <td><input type="text" id="numero_documento" name="numero_documento"></td>
                </tr>
                <tr>
                    <td>Ingrese la ciudad de residencia</td>
                    <td><input type="text" id="ciudad_residencia" name="ciudad_residencia"></td>
                </tr>
                <tr>
                    <td>Ingrese la direccion</td>
                    <td><input type="text" id="direccion" name="direccion"></td>
                </tr>

                <tr>
                    <td>Ingrese el telefono</td>
                    <td><input type="text" id="telefono" name="telefono"></td>
                </tr>

                <td colspan="2"><center>

                    <button id="btoGuardarPaciente" name="btoGuardarPaciente" class="btn btn-success" type="submit" >Guardar</button>
                </center></td>
                </tr>
            </table>
        </form>
    </div>
</div>

