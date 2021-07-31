<div id="f08">
    <form method="post" action="/seriado" target="__blank">
        @csrf
        <table style="width: 100%;color: black">
            <tr >
                <td rowspan="4" style="height: 2cm"><img src="images/natividad.png" alt="Logo Clinica" srcset="" style="height: 4cm; width:8cm;"></td>
                <td style="color: blue; text-align:center; height:0.5cm;">SERVICIO DE LABORATORIO </td>
            </tr>
            <tr>
                <td style="color: blue; text-align:center; height:0.5cm;">Telf: 5254721 Fax: 52-83667 </td>                
            </tr>
            <tr>
                <td style="color: blue; text-align:center; height:0.5cm;">Emergencia las 24 horas del dia. </td>                
            </tr>
            <tr>
                <td style="color: blue; text-align:center; height:0.5cm;">Bolivar Nº 753 entre Arica e Iquique </td>                
            </tr>
        </table>
        <table border="1" style="width: 100%;color: black">
            <tr>
                <td colspan="3" style="text-align: center"><h3>COPROPARASITOLOGICO SERIADO</h3></td>
                <td>Form. 008</td>
            </tr>
            <tr>
                <td style="color: darkblue">PACIENTE</td>
                <td><label class="txtnombre"></label></td>
                <td style="color: darkblue">EDAD</td>
                <td><label class="txtedad"></label></td>
            </tr>
            <tr>
                <td style="color: darkblue">REQUERIDO POR</td>
                <td><input type="text" style="width: 100%" name="requerido" placeholder="Requerido por" list="doctors"></td>
                <datalist id="doctors" class="doctors">
                </datalist>
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
                <td colspan="3" style="text-align: center ">COPROPARASITOLOGICO SERIADO</td>
            </tr>
            <tr>
                <td colspan="2" class="text-center text-red" style="width: 20%">1 MUESTRA</td>
                <td ><input  type="text"  style="width: 100%" name="muestra1"></td>
            </tr>
            <tr>
                <td class="text-left text-red">Fecha</td>
                <td ><input type="date"  style="width: 100%" name="fecha1"></td>
            </tr>
            <tr>
                <td class="text-left text-red">Hora</td>
                <td ><input type="time"  style="width: 100%" name="hora1"></td>
            </tr>
            <tr>
                <td colspan="2" class="text-center text-red" style="width: 20%">2 MUESTRA</td>
                <td ><input type="text"  style="width: 100%" name="muestra2"></td>
            </tr>
            <tr>
                <td class="text-left text-red">Fecha</td>
                <td ><input type="date"  style="width: 100%" name="fecha2"></td>
            </tr>
            <tr>
                <td class="text-left text-red">Hora</td>
                <td ><input type="time"  style="width: 100%" name="hora2"></td>
            </tr>
            <tr>
                <td colspan="2" class="text-center text-red" style="width: 20%">3 MUESTRA</td>
                <td ><input type="text"  style="width: 100%" name="muestra3"></td>
            </tr>
            <tr>
                <td class="text-left text-red">Fecha</td>
                <td ><input type="date"  style="width: 100%" name="fecha3"></td>
            </tr>
            <tr>
                <td class="text-left text-red">Hora</td>
                <td ><input type="time"  style="width: 100%" name="hora3"></td>
            </tr>
            <tr>
                <td colspan="2" class="text-left text-red">OBSERVACIONES</td>
                <td ><input type="text"  style="width: 100%" name="observaciones"></td>
            </tr>

            <tr >
                <td colspan="2" >RESPONSABLE: {{Auth::user()->name}}</td>
{{--                <td colspan="2" rowspan="4">{{Auth::user()->name}}</td>--}}
                <td>
                    FECHA DE ENTREGA RESULTADOS
                    <input type="date" value="{{date('Y-m-d')}}"  style="width: 100%">
                </td>
            </tr>
            </tr>
            <tr>
                <td colspan="6">
                    <button class="btn btn-success btn-block"><i class="fa fa-save"></i> REGISTRAR</button>
                </td>
            </tr>
        </table>

    </form>
</div>
