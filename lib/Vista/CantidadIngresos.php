<div class="panel panel-primary">
    <div class="panel-heading">
        <h3 class="panel-title">Reporte de ingresos por mes</h3>
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
                <td>Seleccione el mes</td>
                <td>
                    <select id="mes" name="mes">
                        <option value="">--seleccione--</option>
                        <option value="1">Enero</option>
                        <option value="2">Febrero</option>
                        <option value="3">Marzo</option>
                        <option value="4">Abril</option>
                        <option value="5">Mayo</option>
                        <option value="6">Junio</option>
                        <option value="7">Julio</option>
                        <option value="8">Agosto</option>
                        <option value="9">Septiembre</option>
                        <option value="10">Octubre</option>
                        <option value="11">Noviembre</option>
                        <option value="12">Diciembre</option>

                    </select>
                </td>
            </tr>
            <tr>
                <td colspan="2">
            <center><input type="button" value="Ver informe" class="btn btn-default" onclick="InformeIngresos()"></center>
            </td>
            </tr>
        </table>
        <br>
        <table class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th>Tipo tratamiento</th>
                    <th>Ingresos en el mes</th>
                </tr>
            </thead>
            <tbody id="ingresos_mes">
            </tbody>

        </table>
    </div>
</div>