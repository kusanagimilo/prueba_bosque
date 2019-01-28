<input type="button" class="btn btn-success" name="crear_tratamiento" value="Crear tratamiento" onclick="DialogCrearTratamiento()">
<br>
<br>
<table id="tratamientos" class="display" cellspacing="0" width="100%">
    <thead>
        <tr>
            <th>Nombre tratamiento</th>
            <th>Valor tratamiento</th>
            <th>Descuento</th>
            <th>Editar</th>
            <th>Eliminar</th>
        </tr>
    </thead>
</table>
<div id="dialog_n_tratamiento"></div>
<div id="dialog_edt_tratamiento"></div>
<script>
    var json = ListarTratamientos();

    $(document).ready(function () {
        $('#tratamientos').DataTable({
            data: json,
            language: {
                url: "js/espanol.json"
            }
        });
    });
</script>