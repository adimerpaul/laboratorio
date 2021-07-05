<div id="f03">
    <form method="post" action="/orina" >
        @csrf
        <table border="1" style="width: 100%;color: black">
            <tr>
                <td colspan="3" style="text-align: center"><h3>HEXAMEN GENERAL DE ORINA</h3></td>
                <td>Form. 003</td>
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
                <td><input type="text" style="width: 100%" name="tipomuestra" placeholder="Tipo muestra" required list="doctors"></td>
                <datalist id="doctors" class="doctors">
                </datalist>
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
            <tr>
                <td class="bg-danger text-center text-white">EX. FISICO</td>
                <td class="bg-danger text-center text-white">VALOR</td>
                <td>REFERENCIA</td>
                <td>EX. QUIMICO</td>
                <td class="bg-danger text-center text-white">VALOR</td>
                <td>REFERENCIA</td>
            </tr>
            <tr>
                <td class="bg-danger text-center text-white">Color</td>
                <td><input placeholder="00" type="text" required style="width: 100%" name="d1"></td>
                <td>Amarillo</td>
                <td class="bg-danger text-center text-white">Proteinas</td>
                <td><input placeholder="00" type="text" required style="width: 100%" name="d2"></td>
                <td>Negativo</td>
            </tr>
            <tr>
                <td class="bg-danger text-center text-white">Olor</td>
                <td><input placeholder="00" type="text" required style="width: 100%" name="d3"></td>
                <td>Sui-generis</td>
                <td class="bg-danger text-center text-white">Glucosa</td>
                <td><input placeholder="00" type="text" required style="width: 100%" name="d4"></td>
                <td>Negativo</td>
            </tr>
            <tr>
                <td class="bg-danger text-center text-white">Aspecto</td>
                <td><input placeholder="00" type="text" required style="width: 100%" name="d5"></td>
                <td>Limpido o lig opal</td>
                <td class="bg-danger text-center text-white">C. cetonicos</td>
                <td><input placeholder="00" type="text" required style="width: 100%" name="d6"></td>
                <td>Negativo</td>
            </tr>
            <tr>
                <td class="bg-danger text-center text-white">Espuma</td>
                <td><input placeholder="00" type="text" required style="width: 100%" name="d7"></td>
                <td>Blanco fugaz</td>
                <td class="bg-danger text-center text-white">Bilirrubina</td>
                <td><input placeholder="00" type="text" required style="width: 100%" name="d8"></td>
                <td>Negativo</td>
            </tr>
            <tr>
                <td class="bg-danger text-center text-white">Deposito</td>
                <td><input placeholder="00" type="text" required style="width: 100%" name="d9"></td>
                <td>Nulo o escacaso</td>
                <td class="bg-danger text-center text-white">Hemoglobina</td>
                <td><input placeholder="00" type="text" required style="width: 100%" name="d10"></td>
                <td>Negativo</td>
            </tr>
            <tr>
                <td class="bg-danger text-center text-white">Densidad</td>
                <td><input placeholder="00" type="text" required style="width: 100%" name="d11"></td>
                <td>1.010-1.030</td>
                <td class="bg-danger text-center text-white">Urobilina</td>
                <td><input placeholder="00" type="text" required style="width: 100%" name="d12"></td>
                <td>Normal</td>
            </tr>
            <tr>
                <td class="bg-danger text-center text-white">Reaccion</td>
                <td><input placeholder="00" type="text" required style="width: 100%" name="d13"></td>
                <td>Lig. acida</td>
                <td class="bg-danger text-center text-white">Nitrinos</td>
                <td><input placeholder="00" type="text" required style="width: 100%" name="d14"></td>
                <td>Negativo</td>
            </tr>
            <tr>
                <td colspan="6" style="text-align: center">SEDIMENTO: EXAMEN MICROSCOPICO</td>
            </tr>
            <tr>
                <td class="bg-danger text-center text-white">CELULAS</td>
                <td class="bg-danger text-center text-white">VALOR</td>
                <td>REFERENCIA</td>
                <td>CILINDROS</td>
                <td class="bg-danger text-center text-white">VALOR</td>
                <td>REFERENCIA</td>
            </tr>
            <tr>
                <td class="bg-danger text-center text-white">Celulas epiteliales</td>
                <td><input placeholder="00" type="text" required style="width: 100%" name="d15"></td>
                <td>Hasta 2/c.</td>
                <td class="bg-danger text-center text-white">Hialino</td>
                <td><input placeholder="00" type="text" required style="width: 100%" name="d16"></td>
                <td>Negativo</td>
            </tr>
            <tr>
                <td class="bg-danger text-center text-white">Celulas de transicion</td>
                <td><input placeholder="00" type="text" required style="width: 100%" name="d17"></td>
                <td>Negativo</td>
                <td class="bg-danger text-center text-white">Granuloso</td>
                <td><input placeholder="00" type="text" required style="width: 100%" name="d18"></td>
                <td>Negativo</td>
            </tr>
            <tr>
                <td class="bg-danger text-center text-white">Celulas clave</td>
                <td><input placeholder="00" type="text" required style="width: 100%" name="d19"></td>
                <td>Negativo</td>
                <td class="bg-danger text-center text-white">Epiteliales</td>
                <td><input placeholder="00" type="text" required style="width: 100%" name="d20"></td>
                <td>Negativo</td>
            </tr>
            <tr>
                <td class="bg-danger text-center text-white">Leucocitos</td>
                <td><input placeholder="00" type="text" required style="width: 100%" name="d21"></td>
                <td>Hasta 5/c</td>
                <td class="bg-danger text-center text-white">Eritrocitario</td>
                <td><input placeholder="00" type="text" required style="width: 100%" name="d22"></td>
                <td>Negativo</td>
            </tr>
            <tr>
                <td class="bg-danger text-center text-white">Eritrocitos</td>
                <td><input placeholder="00" type="text" required style="width: 100%" name="d23"></td>
                <td>Hasta 3/c</td>
                <td class="bg-danger text-center text-white">Leucositario</td>
                <td><input placeholder="00" type="text" required style="width: 100%" name="d24"></td>
                <td>Negativo</td>
            </tr>
            <tr>
                <td class="bg-danger text-center text-white">Bacterias</td>
                <td><input placeholder="00" type="text" required style="width: 100%" name="d25"></td>
                <td>Escaso</td>
                <td class="bg-danger text-center text-white">Cereos</td>
                <td><input placeholder="00" type="text" required style="width: 100%" name="d26"></td>
                <td>Negativo</td>
            </tr>
            <tr>
                <td class="bg-danger text-center text-white">CRISTALES</td>
                <td colspan="2"></td>
                <td class="bg-danger text-center text-white">Mixtos</td>
                <td><input placeholder="00" type="text" required style="width: 100%" name="d27"></td>
                <td>Negativo</td>
            </tr>
            <tr>
                <td class="bg-danger text-center text-white">Uratos amorfos</td>
                <td><input placeholder="00" type="text" required style="width: 100%" name="d28"></td>
                <td>Escasos</td>
                <td colspan="3">OTROS</td>
            </tr>
            <tr>
                <td class="bg-danger text-center text-white">Fosfato amorfo</td>
                <td><input placeholder="00" type="text" required style="width: 100%" name="d29"></td>
                <td>Escasos</td>
                <td class="bg-danger text-center text-white">Filamento mucoso</td>
                <td colspan="2"><input placeholder="00" type="text" required style="width: 100%" name="d30"></td>
            </tr>
            <tr>
                <td class="bg-danger text-center text-white">Oxalato de calcio</td>
                <td><input placeholder="00" type="text" required style="width: 100%" name="d31"></td>
                <td>Escasos</td>
                <td class="bg-danger text-center text-white">Piocitos</td>
                <td colspan="2"><input placeholder="00" type="text" required style="width: 100%" name="d32"></td>
            </tr>
            <tr>
                <td class="bg-danger text-center text-white">Fosfato de calcio</td>
                <td><input placeholder="00" type="text" required style="width: 100%" name="d33"></td>
                <td>Escasos</td>
                <td class="bg-danger text-center text-white">Levaduras</td>
                <td colspan="2"><input placeholder="00" type="text" required style="width: 100%" name="d34"></td>
            </tr>
            <tr>
                <td class="bg-danger text-center text-white">Acido Urico</td>
                <td><input placeholder="00" type="text" required style="width: 100%" name="d35"></td>
                <td>Escasos</td>
                <td class="bg-danger text-center text-white">Esporas micoticas</td>
                <td colspan="2"><input placeholder="00" type="text" required style="width: 100%" name="d36"></td>
            </tr>
            <tr>
                <td class="bg-danger text-center text-white">OBSERVACIONES</td>
                <td colspan="5"><input placeholder="00" type="text" required style="width: 100%" name="d37"></td>
            </tr>
            <tr>
                <td rowspan="4">RESPONSABLE</td>
                <td colspan="2" rowspan="4">{{Auth::user()->name}}</td>
            </tr>
            <tr>
                <td colspan="2">FECHA DE TOMA DE MUESTRAS</td>
                <td><input placeholder="00" type="date" value="{{date('Y-m-d')}}" required style="width: 100%" name="fechatoma"></td>
            </tr>
            <tr>
                <td colspan="2">FECHA DE ENTREGA DE MUESTRAS</td>
                <td>{{date('Y-m-d')}}</td>
            </tr>
            <tr>
                <td colspan="2">HORA TOMA DE MUESTRA</td>
                <td>{{date('H:i:s')}}</td>
            </tr>
            <tr>
                <td colspan="6">
                    <button class="btn btn-success btn-block"><i class="fa fa-save"></i> REGISTRAR</button>
                </td>
            </tr>
        </table>
    </form>
</div>
