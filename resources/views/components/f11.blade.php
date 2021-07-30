<div id="f11">
    <form method="post" action="/reserologia" target="__blank">
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
                <td colspan="3" style="border:0; text-align: center; color:darkblue;"><h3><b> SEROLOGIA</b></h3></td>
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
                <td colspan="4" style="text-align: center; color:red;">PRUEBA RAPIDA ANTIGENOS SARS COV 2</td>
            </tr>
            <tr>
                <td colspan="4" style="text-align: center "></td>
            </tr>
            <tr>
                <td colspan="4" style="text-align: center ">METODO: INMUNOGRAMATOGRAFIA CUALITATIVA</td>
            </tr>
            <tr>
                <td colspan="4" style="text-align: center "></td>
            </tr>
            <tr>
                <td class="text-center text-red" style="width: 20%"></td>
                <td class="text-center text-red" style="width: 20%">ANTIGENO SARS COV2</td>
                <td ><input  type="text"  style="width: 50%" name="d1"></td>
                <td class="text-center text-red" style="width: 20%"></td>
            </tr>
            <tr>
                <td colspan="4" style="text-align:center; color:red"><h5>FUNDAMENTO E INTERPRETACION DE LOS RESULTADOS</h5></td>
            </tr>
            <tr>
                <td colspan="4">La prueba rapida de Antigeno Nasal puede revelar una Infeccion activa de SARS-COV-2.<br>
                El test proporciona un resultado de "<span style="color:red">POSITIVO</span>" o "<span style="color:red">NEGATIVO</span>"<br>
                Los antigenos son parte de la estructura del virus, como las proteinas de espiga.<br><br>
                La muestra de Hisopado nasofaringeo pasa por una linea que detecta antigenos y cambia de color, durante la prueba el anticuerpo monocianal de raton anti-SARS-CoV-2 en la muestra
                interactua con el Anticuerpo monocianal lgG anti-COVID-19 conjugando con particulas de color que forman un complejo de particulas de antigeno-anticuerpo. Este complejo migra en la 
                menbrana por accion capilar hasta la linea de prueba, donde aera capturado por el anticuerpo por el anticuerpo monocianal anti-SARS-CoV-2 de raton. Una linea de prueba coloreada 
                seria visible en la ventana de resultados si los antigenos del SARS-CoV-2 estan presentes en la muestra. <br><br>
                Funciona mejor en la etapa inicial con una <span style="color:red">CARGA VIRAL ALTA</span> y sintomalogia hasta los 10 dias.<br>
                Los resultados <span style="color:red">Negativos</span> indica ausencia de Antigenos detectables de SARS-CoV-2 y cuando la carga viral o la cantidad de antigeno presente se encuentra debajo del limite de deteccion.<br><br>
                Los resultados <span style="color:red">Psitivos</span> no diferencian entre SARS-COV y SARS-COV-2
            
                </td>
            </tr>
            <tr>
                <td colspan="4">
                <span style="color:red">NOTA:</span> Las pruebas rapidas para COVID-19 NO SON CONFIRMATORIAS<br>
                Los Resultados deben ser interpretados en funcion de la Clinica del paciente y dias de evolucion de la enfermedad
                </td>

            </tr>
            <tr>
                <td class="text-left text-red">OBSERVACIONES</td>
                <td colspan="3" ><input type="text"  style="width: 100%" name="d2"></td>
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
