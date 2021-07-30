<div id="f07">
    <form method="post" action="/simple" >
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
                <td colspan="3" style="text-align: center"><h3>COPRAPARASITOLOGICO SIMPLE</h3></td>
                <td>Form. 009</td>
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
            <tr >
                <td colspan="2" style="text-align: center ">COPRAPARASITOLOGICO SIMPLE</td>
            </tr>
            <tr>
                <td class="text-left text-red">ASPECTO DE LA MUESTRA</td>
                <td ><input type="text"  style="width: 100%" name="d1"></td>
            </tr>
            <tr>
                <td class="text-left text-red">COLOR</td>
                <td ><input type="text"  style="width: 100%" name="d2"></td>
            </tr>
            <tr>
                <td class="text-left text-red">CELULAS EPITELIALES</td>
                <td ><input type="text"  style="width: 100%" name="d3"></td>
            </tr>
            <tr>
                <td class="text-left text-red">LEUCOCITOS</td>
                <td ><input type="text"  style="width: 100%" name="d4"></td>
            </tr>
            <tr>
                <td class="text-left text-red">HEMATIES</td>
                <td ><input type="text"  style="width: 100%" name="d5"></td>
            </tr>
            <tr>
                <td class="text-left text-red">GRASAS</td>
                <td ><input type="text"  style="width: 100%" name="d6"></td>
            </tr>
            <tr>
                <td class="text-left text-red">LEVADURAS</td>
                <td ><input type="text"  style="width: 100%" name="d7"></td>
            </tr>
            <tr>
                <td class="text-left text-red">ESPORAS MICOTICAS</td>
                <td ><input type="text"  style="width: 100%" name="d8"></td>
            </tr>
            <tr>
                <td class="text-left text-red">ALMIDON</td>
                <td ><input type="text"  style="width: 100%" name="d9"></td>
            </tr>
            <tr>
                <td class="text-left text-red">PARASITOS</td>
                <td ><input type="text"  style="width: 100%" name="d10"></td>
            </tr>
            <tr>
                <td class="text-left text-red">PIOCITOS</td>
                <td ><input type="text"  style="width: 100%" name="d11"></td>
            </tr>

            <tr>
                <td rowspan="2" class="text-left text-red">MOCO FECAL
                 <input type="text"  style="width: 100%"  name="d12">               </td>
                <td> Polimorfonucleares<input type="text" style="width: 100%"   name="d13"></td>

            </tr>
            <tr>
                <td>Mononucleares<input type="text" style="width: 100%"  name="d14"></td>
                
            </tr>
            <tr>
                <td class="text-left text-red">OBSERVACIONES</td>
                <td ><input type="text"  style="width: 100%" name="d15"></td>
            </tr>

            <tr colspan="2">
                <td colspan="2" class="text-center">OTROS</td>
            </tr>
            <tr>
                <td class="text-left text-red">SANGRE OCULTA EN HECES</td>
                <td ><input type="text"  style="width: 100%" name="d16"></td>
            </tr>
            <tr>
                <td class="text-left text-red">TEST DE BENEDICT</td>
                <td ><input type="text"  style="width: 100%" name="d17"></td>
            </tr>  
  
            <tr>
                <td class="text-left text-red">OBSERVACIONES</td>
                <td ><input type="text"  style="width: 100%" name="d18"></td>
            </tr>

            <tr>
                <td rowspan="2" >RESPONSABLE: {{Auth::user()->name}}</td>
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
