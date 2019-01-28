<div class="panel panel-primary">
    <div class="panel-heading">
        <h3 class="panel-title">3 meses en los cuales se visita mas el hospital</h3>
    </div>
    <div class="panel-body">

        <table class="table table-bordered table-striped">
            <tr>
                <td>Seleccione el año</td>
                <td>
                    <select id="anio" name="anio">
                        <option value="">--seleccione--</option>
                        <option value="2017">2017</option>
                        <option value="2018">2018</option>
                        <option value="2019">2019</option>
                    </select>
                </td>
            </tr>
            <tr>
                <td colspan="2">
            <center><input type="button" value="Ver informe" class="btn btn-default" onclick="VisitasHospital()"></center>
            </td>
            </tr>
        </table>
        <br>
        <table class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th>Mes</th>
                    <th># de visitas</th>
                </tr>
            </thead>
            <tbody id="visitas_hospital">
            </tbody>

        </table>
    </div>
</div>