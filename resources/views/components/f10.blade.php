<div id="f10">
    <form method="post" action="/labserologia" >
        @csrf
        <table border="1" style="width: 100%;color: black">
            <tr>
                <td colspan="3" style="text-align: center"><h3>SEROLOGIA</h3></td>
                <td>Form. 001</td>
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
                <td colspan="2" class="text-center text-red" ></td>
                <td class="text-center text-red" > Valor referencial</td>
                <td class="text-center text-red" >Metodo de Prueba</td>
            </tr>
            <tr>
                <td class="text-left text-red" style="width: 20%">Factor Reumatoide(Latex)</td>
                <td ><input  type="text"  name="d1" ></td>
                <td class="text-center text-yellow">Hasta 8 UI/ml</td>
                <td class="text-center text-blue">Aglutinacion directa</td>
            </tr>
            <tr>
                <td class="text-left text-red" style="width: 20%">Antiestreptolisina</td>
                <td ><input  type="text"  name="d2" ></td>
                <td class="text-center text-yellow">Hasta 200 UI/l</td>
                <td class="text-center text-blue">Aglutinacion directa</td>
            </tr>
            <tr>
                <td class="text-left text-red" style="width: 20%">Proteina C Reactiva</td>
                <td ><input  type="text"  name="d3" ></td>
                <td class="text-center text-yellow">Hasta 0.8 mg/dl</td>
                <td class="text-center text-blue">Aglutinacion directa</td>
            </tr>
            <tr>
                <td class="text-left text-red" style="width: 20%">RPR</td>
                <td ><input  type="text"  name="d4" ></td>
                <td class="text-center text-yellow">No Reactivo</td>
                <td class="text-center text-blue">Floculacion directa </td>
            </tr>
            <tr>
                <td class="text-left text-red" style="width: 20%">Prueba Rapida Sifilis</td>
                <td ><input  type="text"  name="d5" ></td>
                <td class="text-center text-yellow">No Reactivo</td>
                <td class="text-center text-blue">Prueba Rapida Inmunocromatografica</td>
            </tr>
            <tr>
                <td class="text-left text-red" style="width: 20%">Prueba Rapida VIH</td>
                <td ><input  type="text"  name="d6" ></td>
                <td class="text-center text-yellow">No Reactivo</td>
                <td class="text-center text-blue">Prueba Rapida Inmunocromatografica</td>
            </tr>
            <tr>
                <td class="text-left text-red" style="width: 20%">Hepatitis A</td>
                <td ><input  type="text"  name="d7" ></td>
                <td class="text-center text-yellow">NEGATIVO / POSITIVO</td>
                <td class="text-center text-blue">Prueba Rapida Inmunocromatografica</td>
            </tr>
            <tr>
                <td class="text-left text-red" style="width: 20%">Hepatitis B</td>
                <td ><input  type="text"  name="d8" ></td>
                <td class="text-center text-yellow">NEGATIVO / POSITIVO</td>
                <td class="text-center text-blue">Prueba Rapida Inmunocromatografica</td>
            </tr>
            <tr>
                <td class="text-left text-red" style="width: 20%">Hepatitis C</td>
                <td ><input  type="text"  name="d9" ></td>
                <td class="text-center text-yellow">NEGATIVO / POSITIVO</td>
                <td class="text-center text-blue">Prueba Rapida Inmunocromatografica</td>
            </tr>
            <tr>
                <td class="text-left text-red" style="width: 20%">Helicobacter Pylori en Sangre</td>
                <td ><input  type="text"  name="d10" ></td>
                <td class="text-center text-yellow">NEGATIVO / POSITIVO</td>
                <td class="text-center text-blue">Prueba Rapida Inmunocromatografica</td>
            </tr>
            <tr>
                <td class="text-left text-red" style="width: 20%">Helicobacter Pylori en Heces</td>
                <td ><input  type="text"  name="d11" ></td>
                <td class="text-center text-yellow">NEGATIVO / POSITIVO</td>
                <td class="text-center text-blue">Prueba Rapida Inmunocromatografica</td>
            </tr>
            <tr>
                <td class="text-left text-red" style="width: 20%">Troponina I</td>
                <td ><input  type="text"  name="d12" ></td>
                <td class="text-center text-yellow">NEGATIVO / POSITIVO</td>
                <td class="text-center text-blue">Prueba Rapida Inmunocromatografica</td>
            </tr>
            <tr>
                <td class="text-left text-red" style="width: 20%">PSA</td>
                <td ><input  type="text"  name="d13" ></td>
                <td class="text-center text-yellow">Hasta 4 ng/ml</td>
                <td class="text-center text-blue">Prueba Rapida Semicuantitativo</td>
            </tr>



            <tr>
                <td class="text-left text-red">OBSERVACIONES</td>
                <td colspan="3" ><input type="text"  style="width: 100%" name="d14"></td>
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
