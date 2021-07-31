<div id="f02">
    <form method="post" action="/sanguinia" target="__blank">
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
                <td colspan="3" style="text-align: center"><h3>QUIMICA SANGUINEA</h3></td>
                <td>Form. 002</td>
            </tr>
            <tr>
                <td style="color: darkblue">PACIENTE</td>
                <td><label class="txtnombre"></label></td>
                <td style="color: darkblue">EDAD</td>
                <td><label class="txtedad"></label></td>
            </tr>
            <tr>
                <td style="color: darkblue">REQUERIDO POR</td>
                <td><input type="text" style="width: 100%" name="requerido" placeholder="Requerido por" list="doctors" ></td>
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
{{--            <tr>--}}
{{--                <td style="color: darkblue">METODO</td>--}}
{{--                <td colspan="3">--}}
{{--                    Contador Hematologico MINDRAY BC 5130--}}
{{--                    Hematocrito (Metodo Manual) Hemoglobina (Clanmetahemoglobina reactivo drabking)--}}
{{--                </td>--}}
{{--            </tr>--}}
        </table>
        <table border="1" style="width: 100%;color: black">
            <tr class="bg-purpal text-white">
                <th>PRUEBA</th>
                <th>VALOR</th>
                <th>REFERENCIA</th>
                <th>METODO</th>
                <th>PRUEBA</th>
                <th>VALOR</th>
                <th>VALOR</th>
                <th>METODO</th>
            </tr>
            <tr>
                <td class="bg-red text-center text-white">Glicemia</td>
                <td><input placeholder="00" type="text" name="d1"   style="width: 100%"></td>
                <td>70-105mg/dl</td>
                <td>Glucosa Oxidasa</td>
                <td class="bg-red text-center text-white">Fosfatasa alcalina</td>
                <td><input placeholder="00" type="text" name="d2"   style="width: 100%"></td>
                <td>adultos hasta 100UI/L</td>
                <td>Cinetico</td>
            </tr>
            <tr>
                <td class="bg-red text-center text-white">Creatinina</td>
                <td><input placeholder="00" type="text" name="d3"   style="width: 100%"></td>
                <td>0.7-1.5mg/dl</td>
                <td>Picrato Alcalino</td>
                <td class="bg-red text-center text-white">Fosfatasa alcalina</td>
                <td><input placeholder="00" type="text" name="d4"   style="width: 100%"></td>
                <td>niños 100-400UI/L</td>
                <td>Cinetico</td>
            </tr>
            <tr>
                <td class="bg-red text-center text-white">Urea</td>
                <td><input placeholder="00" type="text" name="d5"   style="width: 100%"></td>
                <td>15-45mg/dl</td>
                <td>Enzimatico UV</td>
                <td class="bg-red text-center text-white">Transamisas GOT</td>
                <td><input placeholder="00" type="text" name="d6"   style="width: 100%"></td>
                <td>hasta 40UI/L</td>
                <td>Cinetico</td>
            </tr>
            <tr>
                <td class="bg-red text-center text-white">NUS-BUN</td>
                <td><input placeholder="00" type="text" name="d7"   style="width: 100%"></td>
                <td>7-18mg/dl</td>
                <td>Cinetico UV</td>
                <td class="bg-red text-center text-white">Transamisas GPT</td>
                <td><input placeholder="00" type="text" name="d8"   style="width: 100%"></td>
                <td>hasta 41UI/L</td>
                <td>Cinetico</td>
            </tr>
            <tr>
                <td class="bg-red text-center text-white">Acido Urico</td>
                <td><input placeholder="00" type="text" name="d9"   style="width: 100%"></td>
                <td>2.6-7.2mg/dl</td>
                <td>Uricasa/Peroxidasa</td>
                <td class="bg-purpal text-center text-white">LIPIDOGRAMA</td>
                <td></td>
                <td></td>
                <td></td>
            </tr>
            <tr>
                <td class="bg-red text-center text-white">Proteinas Totales</td>
                <td><input placeholder="00" type="text" name="d10"   style="width: 100%"></td>
                <td>6.2-8.5g/dl</td>
                <td>Biuret</td>
                <td class="bg-red text-center text-white">Trigliceridos</td>
                <td><input placeholder="00" type="text" name="d11"   style="width: 100%"></td>
                <td>40-160mg/dl</td>
                <td>GPO-PAP</td>
            </tr>
            <tr>
                <td class="bg-red text-center text-white">Albumina</td>
                <td><input placeholder="00" type="text" name="d12"   style="width: 100%"></td>
                <td>3.5-5.3g/dl</td>
                <td>Verde Bromocresol</td>
                <td class="bg-red text-center text-white">Colesterol Total</td>
                <td><input placeholder="00" type="text" name="d13"   style="width: 100%"></td>
                <td>menor 200mg/dl</td>
                <td>CHOD-PAP</td>
            </tr>
            <tr>
                <td class="bg-red text-center text-white">Globulina</td>
                <td><input placeholder="00" type="text" name="d14"   style="width: 100%"></td>
                <td>2.8-3.5g/dl</td>
                <td></td>
                <td class="bg-red text-center text-white">HDL-Col.</td>
                <td><input placeholder="00" type="text" name="d15"   style="width: 100%"></td>
                <td>35-65mg/dl</td>
                <td>CHOD-PAP</td>
            </tr>
            <tr>
                <td class="bg-red text-center text-white">Amilasa</td>
                <td><input placeholder="00" type="text" name="d16"   style="width: 100%"></td>
                <td>menor a 120 UI/L</td>
                <td>Enzimatico a Amilasa</td>
                <td class="bg-red text-center text-white">LDL-Col.</td>
                <td><input placeholder="00" type="text" name="d17"   style="width: 100%"></td>
                <td>Hasta 150mg/dl</td>
                <td>CHOD-PAP</td>
            </tr>
            <tr>
                <td class="bg-red text-center text-white">Lipasa</td>
                <td><input placeholder="00" type="text" name="d18"   style="width: 100%"></td>
                <td>10-150UI/L</td>
                <td>Enzimatica Colorimetrica</td>
                <td class="bg-purpal text-center text-white">ELECTROLITOS</td>
                <td></td>
                <td></td>
                <td></td>
            </tr>
            <tr>
                <td class="bg-red text-center text-white">Bilirrubina Total</td>
                <td><input placeholder="00" type="text" name="d19"   style="width: 100%"></td>
                <td>hasta 1.2 mg/dl</td>
                <td rowspan="3">Acido Sulfanilico con Diaazo</td>
                <td class="bg-red text-center text-white">Sodio</td>
                <td><input placeholder="00" type="text" name="d20"   style="width: 100%"></td>
                <td>135-155 mEq/L</td>
                <td rowspan="4">Automatizado CORNLEY AFT-500</td>
            </tr>
            <tr>
                <td class="bg-red text-center text-white">Bilirrubina Directa</td>
                <td><input placeholder="00" type="text" name="d21"   style="width: 100%"></td>
                <td>hasta 0.3 mg/dl</td>
                <td class="bg-red text-center text-white">Cloro</td>
                <td><input placeholder="00" type="text" name="d22"   style="width: 100%"></td>
                <td>98-106 mEq/L</td>
            </tr>
            <tr>
                <td class="bg-red text-center text-white">Bilirrubina Inderecta</td>
                <td><input placeholder="00" type="text" name="d23"   style="width: 100%"></td>
                <td>hasta 0.9 mg/dl</td>
                <td class="bg-red text-center text-white">Potasio</td>
                <td><input placeholder="00" type="text" name="d24"   style="width: 100%"></td>
                <td>3.4-5.3 mEq/L</td>
            </tr>
            <tr>
                <td class="bg-red text-center text-white">CK-MB</td>
                <td><input placeholder="00" type="text" name="d25"   style="width: 100%"></td>
                <td>0-24 UI/L</td>
                <td>Enzimatico </td>
                <td class="bg-red text-center text-white">Calcio</td>
                <td><input placeholder="00" type="text" name="d26"   style="width: 100%"></td>
                <td>8.5-10.5mg/dl</td>
            </tr>
            <tr>
                <td class="bg-red text-center text-white">LDH</td>
                <td><input placeholder="00" type="text" name="d27"   style="width: 100%"></td>
                <td>200-480UI/L</td>
                <td>Piruvato Lactato</td>
                <td class="bg-red text-center text-white">Magnesio</td>
                <td><input placeholder="00" type="text" name="d28"   style="width: 100%"></td>
                <td>1.7-2.4mg/dl</td>
                <td>Colorimetrico calmagita</td>
            </tr>
            <tr>
                <td class="bg-red text-center text-white">Hierro</td>
                <td><input placeholder="00" type="text" name="d29"   style="width: 100%"></td>
                <td>50-170ug/dl</td>
                <td>Goodwing Modificado</td>
                <td class="bg-red text-center text-white">Fosforo</td>
                <td><input placeholder="00" type="text" name="d30"   style="width: 100%"></td>
                <td>2.5-4.5mg/dl</td>
                <td>Fosfomolibdato UV</td>
            </tr>
            <tr>
                <td colspan="2" class="bg-blue text-center text-white">OBSERVACIONES</td>
                <td colspan="6"><input placeholder="00" type="text" name="d31"   style="width: 100%" ></td>
            </tr>
            <tr>
                <td colspan="2" rowspan="2" class="bg-blue text-center text-white">RESPONSABLE</td>
                <td colspan="2" rowspan="2">
                    {{Auth::user()->name}}
                </td>
                <td colspan="3" class="bg-blue text-center text-white">FECHA TOMA DE MUESTRA</td>
                <td><input placeholder="00" type="date" name="d32"   style="width: 100%" value="{{date('Y-m-d')}}"></td>
            </tr>
            <tr>
                <td colspan="3" class="bg-blue text-center text-white">FECHA DE ENTREGA DE RESULTADO</td>
                <td><input placeholder="00" type="date" name="d33"   style="width: 100%" value="{{date('Y-m-d')}}"></td>
            </tr>
            <tr>
                <td colspan="8">
                    <button type="submit" class="btn btn-success btn-block"><i class="fa fa-plus-circle"></i> GUARDAR</button>
                </td>
            </tr>
        </table>
    </form>
</div>
