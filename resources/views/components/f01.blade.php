<div id="f01">
    <form method="post" action="/hemograma" target="__blank">
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
                <td colspan="3" style="text-align: center"><h3>HEMOGRAMA COMPLETO</h3></td>
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
                <td>
                    <select name="requerido" id="requerido" required style="width:100%"></select>
                </td>
                
                <td style="color: darkblue">SEXO </td>
                <td><label class="txtsexo"></label></td>
            </tr>
            <tr>
                <td style="color: darkblue">TIPO MUESTRA</td>
                <td><input type="text" style="width: 100%" name="tipomuestra" placeholder="Tipo muestra" ></td>
                <td style="color: darkblue">N PACIENTE</td>
                <td><label class="txtn"></label> <input type="hidden" class="paciente_id" name="paciente_id"></td>
            </tr>
            <tr>
                <td style="color: darkblue">METODO</td>
                <td colspan="3">
                    Contador Hematologico MINDRAY BC 5130
                    Hematocrito (Metodo Manual) Hemoglobina (Clanmetahemoglobina reactivo drabking)
                </td>
            </tr>
        </table>
        <table border="1" style="width: 100%;color: black">
            <tr>
                <td colspan="3"></td>
                <td>REFERENCIA</td>
                <td colspan="2"></td>
                <td>REFERENCIA</td>
            </tr>
            <tr>
                <td class="bg-danger text-white">Globulos Rojos</td>
                <td><input type="text" placeholder="00" name="d1"   style="width: 100%"></td>
                <td>x10 <sup>12 </sup>/L</td>
                <td>Varon 5.1-5.7x10 <sup>12</sup>/L <br> Mujer 4.8-5.4x10 <sup>12</sup>/L</td>
                <td class="bg-danger text-white">Tiempo de cuagulacion</td>
                <td><input type="text" placeholder="00" name="d2"   style="width: 100%"></td>
                <td>5-10 min</td>
            </tr>
            <tr>
                <td class="bg-danger text-white">Hemoglobina</td>
                <td><input type="text" placeholder="00" name="d3"   style="width: 100%"></td>
                <td>g/L</td>
                <td>Varon 151-175 g/L <br> Mujer Mujer 141-165 g/L</td>
                <td class="bg-danger text-white">Tiempo de sangria</td>
                <td><input type="text" placeholder="00" name="d4"   style="width: 100%"></td>
                <td>1-3 min</td>
            </tr>
            <tr>
                <td class="bg-danger text-white">Hematocrito</td>
                <td><input type="text" placeholder="00" name="d5"   style="width: 100%"></td>
                <td>L/L</td>
                <td>Varon 0.51-0.57 L/L <br> Mujer 0.46-0.53 L/L</td>
                <td class="bg-danger text-white">Tiempo de Protrombina</td>
                <td><input type="text" placeholder="00" name="d6"   style="width: 100%"></td>
                <td>12-13 seg</td>
            </tr>
            <tr>
                <td class="bg-danger text-white">V.E.S.</td>
                <td><input type="text" placeholder="00" name="d7"   style="width: 100%"></td>
                <td>mm.</td>
                <td>Varon 15 mm/hora <br> Mujer 20 mm/hora</td>
                <td class="bg-danger text-white">% Actividad</td>
                <td><input type="text" placeholder="00" name="d8"   style="width: 100%"></td>
                <td>95-100%</td>
            </tr>

            <tr>
                <td class="bg-danger text-white">V.C.M.</td>
                <td><input type="text" placeholder="00" name="d9"   style="width: 100%"></td>
                <td>ft.</td>
                <td>Varon 83.0-97.0 ft</td>
                <td class="bg-danger text-white">INR</td>
                <td><input type="text" placeholder="00" name="d10"   style="width: 100%"></td>
                <td>0.97-1.04</td>
            </tr>
            <tr>
                <td class="bg-danger text-white">Hb.C.M.</td>
                <td><input type="text" placeholder="00" name="d11"   style="width: 100%"></td>
                <td>pg.</td>
                <td>27.0-31.0 pg.</td>
                <td class="bg-danger text-white">Grupofactor</td>
                <td colspan="2"><input type="text" placeholder="00" name="d12"   style="width: 100%"></td>
            </tr>
            <tr>
                <td class="bg-danger text-white">C. Hb.C.M.</td>
                <td><input type="text" placeholder="00" name="d13"   style="width: 100%"></td>
                <td>%</td>
                <td>32-36%</td>
                <td class="bg-danger text-white">Reticulocitos</td>
                <td><input type="text" placeholder="00" name="d14"   style="width: 100%"></td>
                <td>0.5-2%</td>
            </tr>
            <tr>
                <td class="bg-danger text-white">Globulos Blancos</td>
                <td><input type="text" placeholder="00" name="d15"   style="width: 100%"></td>
                <td>10 <sup>9</sup>/L</td>
                <td> 4.5-10.5x10 <sup>9</sup>/L</td>
                <td class="bg-danger text-white">IPR</td>
                <td><input type="text" placeholder="00" name="d16"   style="width: 100%"></td>
                <td></td>
            </tr>
            <tr>
                <td class="bg-danger text-white">Plaquetas</td>
                <td><input type="text" placeholder="00" name="d17"   style="width: 100%"></td>
                <td>x10 <sup>9 </sup>/L</td>
                <td>105-400x10 <sup>9</sup> /L</td>
                <td colspan="3"></td>
            </tr>
        </table>
        <table border="1" style="width: 100%;color: black">
            <tr>
                <td colspan="5"></td>
                <td colspan="2">VALOR REFERENCIAL</td>
            </tr>
            <tr>
                <td class="bg-danger text-white"></td>
                <td colspan="2">RELATIVA</td>
                <td colspan="2">ABSOLUTA</td>
                <td>RELATIVA</td>
                <td>ABSOLUTA</td>
            </tr>
            <tr>
                <td class="bg-danger text-white">Cayados</td>
                <td><input type="text" placeholder="00" name="d18"   style="width: 100%"></td>
                <td>%</td>
                <td><input type="text" placeholder="00" name="d19"   style="width: 100%"></td>
                <td>x10 <sup>9</sup>/L</td>
                <td>0-3%</td>
                <td>0.00-0.35x10 <sup>9</sup>/L</td>
            </tr>
            <tr>
                <td class="bg-danger text-white">Neutrofilos</td>
                <td><input type="text" placeholder="00" name="d20"   style="width: 100%"></td>
                <td>%</td>
                <td><input type="text" placeholder="00" name="d21"   style="width: 100%"></td>
                <td>x10 <sup>9</sup>/L</td>
                <td>50-70%</td>
                <td>2.50-7.35x10 <sup>9</sup>/L</td>
            </tr>
            <tr>
                <td class="bg-danger text-white">Eosinofilos</td>
                <td><input type="text" placeholder="00" name="d22"   style="width: 100%"></td>
                <td>%</td>
                <td><input type="text" placeholder="00" name="d23"   style="width: 100%"></td>
                <td>x10 <sup>9</sup>/L</td>
                <td>0-3%</td>
                <td>0.00-0.35x10 <sup>9</sup>/L</td>
            </tr>
            <tr>
                <td class="bg-danger text-white">Basofilos</td>
                <td><input type="text" placeholder="00" name="d24"   style="width: 100%"></td>
                <td>%</td>
                <td><input type="text" placeholder="00" name="d25"   style="width: 100%"></td>
                <td>x10 <sup>9</sup>/L</td>
                <td>0-1%</td>
                <td>0.00-0.15x10 <sup>9</sup>/L</td>
            </tr>
            <tr>
                <td class="bg-danger text-white">Linfocitos</td>
                <td><input type="text" placeholder="00" name="d26"   style="width: 100%"></td>
                <td>%</td>
                <td><input type="text" placeholder="00" name="d27"   style="width: 100%"></td>
                <td>x10 <sup>9</sup>/L</td>
                <td>25-40%</td>
                <td>1.25-4.200x10 <sup>9</sup>/L</td>
            </tr>
            <tr>
                <td class="bg-danger text-white">Monocitos</td>
                <td><input type="text" placeholder="00" name="d28"   style="width: 100%"></td>
                <td>%</td>
                <td><input type="text" placeholder="00" name="d29"   style="width: 100%"></td>
                <td>x10 <sup>9</sup>/L</td>
                <td>4-8%</td>
                <td>2.00-8.40x10 <sup>9</sup>/L</td>
            </tr>
            <tr>
                <td class="bg-danger text-white">BLASTOS</td>
                <td><input type="text" placeholder="00" name="d30"   style="width: 100%"></td>
                <td>%</td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
            </tr>
        </table>
        <table border="1" style="width: 100%;color: black">
            <tr>
                <td colspan="2">MORFOLOGIA DE FRONTIS DE SANGRE PERIFERICA</td>
            </tr>
            <tr>
                <td class="bg-danger text-white">Serie Rojas:</td>
                <td><input type="text" placeholder="00" name="d31"   style="width: 100%"></td>
            </tr>
            <tr>
                <td class="bg-danger text-white">Serie Blancas:</td>
                <td><input type="text" placeholder="00" name="d32"   style="width: 100%"></td>
            </tr>
            <tr>
                <td class="bg-danger text-white">Serie Plaquetarias:</td>
                <td><input type="text" placeholder="00" name="d33"   style="width: 100%"></td>
            </tr>
            <tr>
                <td class="bg-danger text-white">FECHA DE TOMA DE MUESTRA:</td>
                <td><input type="date" name="fechatoma"   style="width: 100%" value="{{date('Y-m-d')}}"></td>
            </tr>
            <tr>
                <td colspan="2">
                    <button class="btn btn-success btn-block" type="submit"><i class="fa fa-save"></i> REGISTRAR</button>
                </td>
            </tr>
        </table>
    </form>
</div>
