<div id="f09">
    <form method="post" action="/serologia" target="__blank">
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
                <td colspan="4" style="text-align: center ">PRUEBA ANTICUERPOS CUANTITATIVOS ANTI SARS COV-2 lg M / lg G</td>
            </tr>
            <tr>
                <td class="text-center text-red" style="width: 20%">lgM</td>
                <td ><input  type="number" step="0.1" value="0.0"  style="width: 100%" name="lgm" id="lgm" min="0.0"></td>
                <td ><input  type="text"  style="width: 100%" name="d1" id="d1"></td>
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
                <td ><input  type="number" step="0.1" value="0.0"  style="width: 100%" name="lgg" id="lgg" min="0.0"></td>
                <td ><input  type="text"  style="width: 100%" name="d2" id="d2"></td>
                <td style="width: 20%"> >= 1.1 POSITIVO lgG/lgM</td>
            </tr>
            <tr>
                <td colspan="4" style="color:red">INTERPRETACION DE RESULTADOS</td>
            </tr>
            <tr style="text-align:center; color:red">
                <td>lg M</td>
                <td>lg G</td>
                <td>INTERPRETACION</td>
                <td>COMENTARION</td>
            </tr>
            <tr style="text-align:center">
                <td><img src="/images/resta.png" alt="negativo" srcset="" style="height: 1.5cm; width:1.5cm;"></td>
                <td><img src="/images/resta.png" alt="negativo" srcset="" style="height: 1.5cm; width:1.5cm;"></td>
                <td>Ausencia de la Enfermedad o Falso Negativo</td>
                <td>Paciente en fase de evolucion de la enfermedad mayor de 21 dias</td>
            </tr>
            <tr style="text-align:center">
                <td><img src="/images/suma.png" alt="positivo" srcset="" style="height: 1.5cm; width:1.5cm;"></td>
                <td><img src="/images/resta.png" alt="negativo" srcset="" style="height: 1.5cm; width:1.5cm;"></td>
                <td>Inicio Temprano de ka Enfermedad Infeccion Aguda de la Enfermedad</td>
                <td>Se debe repetir dentro de 5 a 7 dias la prueba</td>
            </tr>
            <tr style="text-align:center">
                <td><img src="/images/suma.png" alt="positivo" srcset="" style="height: 1.5cm; width:1.5cm;"></td>
                <td><img src="/images/suma.png" alt="positivo" srcset="" style="height: 1.5cm; width:1.5cm;"></td>
                <td>Fase activa de la Enfermedad</td>
                <td>Correlacionar con clinica del paciente y realizar examenes complementarios (Rayos X, Tomografia)</td>
            </tr>
            <tr style="text-align:center">
                <td><img src="/images/resta.png" alt="negativo" srcset="" style="height: 1.5cm; width:1.5cm;"></td>
                <td><img src="/images/suma.png" alt="positivo" srcset="" style="height: 1.5cm; width:1.5cm;"></td>
                <td>Inmunidad Fase final de la Infeccion Infeccion pasada y curada</td>
                <td>Paciente en fase de evolucion de la enfermedad mayor a 21 dias</td>
            </tr>
            <tr>
                <td colspan="4">
                    <span style="color:red">NOTA: </span>
                    Las pruebas rapidas para COVID-19 NO SON CONFIRMATORIAS, en caso de salir positivo alguno de los anticuerpo
                    , se recimienda una segunda toma de muestra con la Tecnica de HISOPADO NASOFARINGEO para RT - PCR y asi confirmar su DIAGNOSTICO
                </td>
            </tr>
            <tr>
                <td colspan="4">
                    Todas las personas producimos anticuerpos a diferente velocidad dependiendo del agente patogeno y nuestra genetica que es lo que
                    determina la funcionalidad de nuestro Sistema Inmunologico
                </td>
            </tr>
            <tr>
                <td colspan="4">
                    Los Resultados deben ser interpretados en funcion de la Clinica del paciente y dias de evolucion de la enfermedad
                </td>
            </tr>
            <tr>
                <td class="text-left text-red">OBSERVACION</td>
                <td colspan="3" ><input type="text"  style="width: 100%" name="d3"></td>
            </tr>

            <tr >
                <td colspan="2" rowspan="2" >RESPONSABLE: {{Auth::user()->name}}</td>
{{--                <td colspan="2" rowspan="4">{{Auth::user()->name}}</td>--}}
                <td colspan="2">
                    FECHA DE TOMA DE MUESTRAS
                    <input placeholder="00" type="date" value="{{date('Y-m-d')}}"  style="width: 100%" name="fechatoma">
                </td>
            </tr>
            <tr>
{{--                <td colspan="2">FECHA DE ENTREGA DE MUESTRAS</td>--}}
{{--                <td>{{date('Y-m-d')}}</td>--}}
                <td colspan="2">
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

