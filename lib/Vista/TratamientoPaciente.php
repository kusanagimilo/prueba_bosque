<div class="panel panel-primary">
    <div class="panel-heading">
        <h3 class="panel-title">Tratamiento por paciente</h3>
    </div>
    <div class="panel-body">

        <table class="table table-bordered table-striped">
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
                <td>Ingrese el numero de documento</td>
                <td><input type="text" id="numero_documento" name="numero_documento"></td>
            </tr>
            <tr>
                <td colspan="2">
            <center><input type="button" value="Buscar paciente" class="btn btn-default" onclick="TratamientoPacienteForm();"></center>
            </td>
            </tr>
        </table>
        <br>
        <div id="forma_tratamiento_paciente">

        </div>
    </div>
</div>