<div id="f04">
    <form method="post" action="/hemograma" >
        @csrf
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
                <td><input type="text" style="width: 100%" name="requerido" placeholder="Requerido por" required></td>
                <td style="color: darkblue">SEXO</td>
                <td><label class="txtsexo"></label></td>
            </tr>
            <tr>
                <td style="color: darkblue">TIPO MUESTRA</td>
                <td><input type="text" style="width: 100%" name="tipomuestra" placeholder="Tipo muestra" required></td>
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
                <td>Globulos Rojos</td>
                <td><input type="text" name="d1"  required style="width: 100%"></td>
                <td>x10 <sup>12 </sup>/L</td>
                <td>Varon 5.1-5.7x10 <sup>12</sup>/L <br> Mujer 4.8-5.4x10 <sup>12</sup>/L</td>
                <td>Tiempo de cuagulacion</td>
                <td><input type="text" name="d2"  required style="width: 100%"></td>
                <td>5-10 min</td>
            </tr>
            <tr>
                <td>Hemoglobina</td>
                <td><input type="text" name="d3"  required style="width: 100%"></td>
                <td>g/L</td>
                <td>Varon 151-175 g/L <br> Mujer Mujer 141-165 g/L</td>
                <td>Tiempo de sangria</td>
                <td><input type="text" name="d4"  required style="width: 100%"></td>
                <td>1-3 min</td>
            </tr>
            <tr>
                <td>Hematocrito</td>
                <td><input type="text" name="d5"  required style="width: 100%"></td>
                <td>L/L</td>
                <td>Varon 0.51-0.57 L/L <br> Mujer 0.46-0.53 L/L</td>
                <td>Tiempo de Protrombina</td>
                <td><input type="text" name="d6"  required style="width: 100%"></td>
                <td>12-13 seg</td>
            </tr>
            <tr>
                <td>V.E.S.</td>
                <td><input type="text" name="d7"  required style="width: 100%"></td>
                <td>mm.</td>
                <td>Varon 15 mm/hora <br> Mujer 20 mm/hora</td>
                <td>% Actividad</td>
                <td><input type="text" name="d8"  required style="width: 100%"></td>
                <td>95-100%</td>
            </tr>

            <tr>
                <td>V.C.M.</td>
                <td><input type="text" name="d9"  required style="width: 100%"></td>
                <td>ft.</td>
                <td>Varon 83.0-97.0 ft</td>
                <td>INR</td>
                <td><input type="text" name="d10" required  style="width: 100%"></td>
                <td>0.97-1.04</td>
            </tr>
            <tr>
                <td>Hb.C.M.</td>
                <td><input type="text" name="d11" required  style="width: 100%"></td>
                <td>pg.</td>
                <td>27.0-31.0 pg.</td>
                <td>Grupofactor</td>
                <td colspan="2"><input type="text" name="d12" required  style="width: 100%"></td>
            </tr>
            <tr>
                <td>C. Hb.C.M.</td>
                <td><input type="text" name="d13" required  style="width: 100%"></td>
                <td>%</td>
                <td>32-36%</td>
                <td>Reticulocitos</td>
                <td><input type="text" name="d14" required  style="width: 100%"></td>
                <td>0.5-2%</td>
            </tr>
            <tr>
                <td>Globulos Blancos</td>
                <td><input type="text" name="d15" required  style="width: 100%"></td>
                <td>10 <sup>9</sup>/L</td>
                <td> 4.5-10.5x10 <sup>9</sup>/L</td>
                <td>IPR</td>
                <td><input type="text" name="d16" required  style="width: 100%"></td>
                <td></td>
            </tr>
            <tr>
                <td>Plaquetas</td>
                <td><input type="text" name="d17" required  style="width: 100%"></td>
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
                <td></td>
                <td colspan="2">RELATIVA</td>
                <td colspan="2">ABSOLUTA</td>
                <td>RELATIVA</td>
                <td>ABSOLUTA</td>
            </tr>
            <tr>
                <td>Cayados</td>
                <td><input type="text" name="d18" required  style="width: 100%"></td>
                <td>%</td>
                <td><input type="text" name="d19" required  style="width: 100%"></td>
                <td>x10 <sup>9</sup>/L</td>
                <td>0-3%</td>
                <td>0.00-0.35x10 <sup>9</sup>/L</td>
            </tr>
            <tr>
                <td>Neutrofilos</td>
                <td><input type="text" name="d20" required  style="width: 100%"></td>
                <td>%</td>
                <td><input type="text" name="d21" required  style="width: 100%"></td>
                <td>x10 <sup>9</sup>/L</td>
                <td>50-70%</td>
                <td>2.50-7.35x10 <sup>9</sup>/L</td>
            </tr>
            <tr>
                <td>Eosinofilos</td>
                <td><input type="text" name="d22" required  style="width: 100%"></td>
                <td>%</td>
                <td><input type="text" name="d23" required  style="width: 100%"></td>
                <td>x10 <sup>9</sup>/L</td>
                <td>0-3%</td>
                <td>0.00-0.35x10 <sup>9</sup>/L</td>
            </tr>
            <tr>
                <td>Basofilos</td>
                <td><input type="text" name="d24" required  style="width: 100%"></td>
                <td>%</td>
                <td><input type="text" name="d25" required  style="width: 100%"></td>
                <td>x10 <sup>9</sup>/L</td>
                <td>0-1%</td>
                <td>0.00-0.15x10 <sup>9</sup>/L</td>
            </tr>
            <tr>
                <td>Linfocitos</td>
                <td><input type="text" name="d26" required  style="width: 100%"></td>
                <td>%</td>
                <td><input type="text" name="d27" required  style="width: 100%"></td>
                <td>x10 <sup>9</sup>/L</td>
                <td>25-40%</td>
                <td>1.25-4.200x10 <sup>9</sup>/L</td>
            </tr>
            <tr>
                <td>Monocitos</td>
                <td><input type="text" name="d28" required  style="width: 100%"></td>
                <td>%</td>
                <td><input type="text" name="d29" required  style="width: 100%"></td>
                <td>x10 <sup>9</sup>/L</td>
                <td>4-8%</td>
                <td>2.00-8.40x10 <sup>9</sup>/L</td>
            </tr>
            <tr>
                <td>BLASTOS</td>
                <td><input type="text" name="d30" required  style="width: 100%"></td>
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
                <td>Serie Rojas:</td>
                <td><input type="text" name="d31" required  style="width: 100%"></td>
            </tr>
            <tr>
                <td>Serie Blancas:</td>
                <td><input type="text" name="d32" required  style="width: 100%"></td>
            </tr>
            <tr>
                <td>Serie Plaquetarias:</td>
                <td><input type="text" name="d33" required  style="width: 100%"></td>
            </tr>
            <tr>
                <td>FECHA DE TOMA DE MUESTRA:</td>
                <td><input type="date" name="fechatoma" required  style="width: 100%" value="{{date('Y-m-d')}}"></td>
            </tr>
            <tr>
                <td colspan="2">
                    <button class="btn btn-success btn-block"><i class="fa fa-save"></i> REGISTRAR</button>
                </td>
            </tr>
        </table>
    </form>
</div>
