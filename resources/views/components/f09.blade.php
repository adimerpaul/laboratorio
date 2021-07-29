<div id="f09">
    <form method="post" action="/serologia" >
        @csrf
        <table border="1" style="width: 100%;color: black">
            <tr>
                <td colspan="3" style="text-align: center"><h3>SEROLOGIA</h3></td>
                <td>Form. 005</td>
            </tr>
            <tr>
                <td style="color: darkblue">PACIENTE</td>
                <td><label class="txtnombre"></label></td>
                <td style="color: darkblue">EDAD</td>
                <td><label class="txtedad"></label></td>
            </tr>
            <tr>
                <td style="color: darkblue">REQUERIDO POR</td>
                <td><input type="text" style="width: 100%" name="requerido" placeholder="Requerido por" ></td>
                <td style="color: darkblue">SEXO</td>
                <td><label class="txtsexo"></label></td>
            </tr>
            <tr>
                <td style="color: darkblue">TIPO MUESTRA</td>
                <td><input type="text" style="width: 100%" name="tipomuestra" placeholder="Tipo muestra" ></td>
                <td style="color: darkblue">N PACIENTE</td>
                <td><label class="txtn"></label> <input type="hidden" class="paciente_id" name="paciente_id"></td>
            </tr>

        </table>
        <br>
        <table border="1" style="width: 100%;color: black">
            <tr>
                <td colspan="4" style="text-align: center ">PRUEBA ANTICUERPOS CUANTITATIVOS ANTI SARS COV-2 lg M / lg G</td>
            </tr>
            <tr>
                <td class="text-center text-red" style="width: 20%">lgM</td>
                <td ><input  type="number" step="0.1" value="0.0"  style="width: 100%" name="lgm" min="0.0"></td>
                <td ><input  type="text"  readonly  style="width: 100%" name="d1"></td>
                <td> < 0.9 NEGATIVO PARA lgG/lgM</td>
            </tr>
            <tr>
                <td></td>
                <td></td>
                <td></td>
                <td>0.9 <= & < 1.1 INDETERMINADO </td>
            </tr>
            <tr>
                <td class="text-center text-red" style="width: 20%">lgG</td>
                <td ><input  type="number" step="0.1" value="0.0"  style="width: 100%" name="lgg" min="0.0"></td>
                <td ><input  type="text"  readonly  style="width: 100%" name="d2"></td>
                <td style="width: 20%"> >= 1.1 POSITIVO lgG/lgM</td>
            </tr>


            <tr>
                <td class="text-left text-red">OBSERVACIONES</td>
                <td colspan="3" ><input type="text"  style="width: 100%" name="d3"></td>
            </tr>

            <tr >
                <td colspan="2" rowspan="2" >RESPONSABLE: {{Auth::user()->name}}</td>
{{--                <td colspan="2" rowspan="4">{{Auth::user()->name}}</td>--}}
                <td>
                    FECHA DE TOMA DE MUESTRAS
                    <input placeholder="00" type="date" value="{{date('Y-m-d')}}"  style="width: 100%" name="fechatoma">
                </td>
            </tr>
            <tr>
{{--                <td colspan="2">FECHA DE ENTREGA DE MUESTRAS</td>--}}
{{--                <td>{{date('Y-m-d')}}</td>--}}
                <td>
                    FECHA DE ENTREGA DE MUESTRAS
                    <input placeholder="00" type="date" value="{{date('Y-m-d')}}"  style="width: 100%" name="fechaentrega">
                </td>
            </tr>
            <tr>
                <td colspan="6">
                    <button class="btn btn-success btn-block"><i class="fa fa-save"></i> REGISTRAR</button>
                </td>
            </tr>
        </table>

    </form>
</div>
