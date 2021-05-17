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
                <td><input type="text" style="width: 100%" name="tipomuestra" placeholder="Tipo muestra" required></td>
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
                <td>EX. FISICO</td>
                <td>VALOR</td>
                <td>REFERENCIA</td>
                <td>EX. QUIMICO</td>
                <td>VALOR</td>
                <td>REFERENCIA</td>
            </tr>
            <tr>
                <td>Color</td>
                <td><input type="text" required style="width: 100%" name="d1"></td>
                <td>Amarillo</td>
                <td>Proteinas</td>
                <td><input type="text" required style="width: 100%" name="d2"></td>
                <td>Negativo</td>
            </tr>
            <tr>
                <td>Olor</td>
                <td><input type="text" required style="width: 100%" name="d3"></td>
                <td>Sui-generis</td>
                <td>Glucosa</td>
                <td><input type="text" required style="width: 100%" name="d4"></td>
                <td>Negativo</td>
            </tr>
            <tr>
                <td>Aspecto</td>
                <td><input type="text" required style="width: 100%" name="d5"></td>
                <td>Limpido o lig opal</td>
                <td>C. cetonicos</td>
                <td><input type="text" required style="width: 100%" name="d6"></td>
                <td>Negativo</td>
            </tr>
            <tr>
                <td>Espuma</td>
                <td><input type="text" required style="width: 100%" name="d7"></td>
                <td>Blanco fugaz</td>
                <td>Bilirrubina</td>
                <td><input type="text" required style="width: 100%" name="d8"></td>
                <td>Negativo</td>
            </tr>
            <tr>
                <td>Deposito</td>
                <td><input type="text" required style="width: 100%" name="d9"></td>
                <td>Nulo o escacaso</td>
                <td>Hemoglobina</td>
                <td><input type="text" required style="width: 100%" name="d10"></td>
                <td>Negativo</td>
            </tr>
            <tr>
                <td>Densidad</td>
                <td><input type="text" required style="width: 100%" name="d11"></td>
                <td>1.010-1.030</td>
                <td>Urobilina</td>
                <td><input type="text" required style="width: 100%" name="d12"></td>
                <td>Normal</td>
            </tr>
            <tr>
                <td>Reaccion</td>
                <td><input type="text" required style="width: 100%" name="d13"></td>
                <td>Lig. acida</td>
                <td>Nitrinos</td>
                <td><input type="text" required style="width: 100%" name="d14"></td>
                <td>Negativo</td>
            </tr>
            <tr>
                <td colspan="6" style="text-align: center">SEDIMENTO: EXAMEN MICROSCOPICO</td>
            </tr>
            <tr>
                <td>CELULAS</td>
                <td>VALOR</td>
                <td>REFERENCIA</td>
                <td>CILINDROS</td>
                <td>VALOR</td>
                <td>REFERENCIA</td>
            </tr>
            <tr>
                <td>Celulas epiteliales</td>
                <td><input type="text" required style="width: 100%" name="d15"></td>
                <td>Hasta 2/c.</td>
                <td>Hialino</td>
                <td><input type="text" required style="width: 100%" name="d16"></td>
                <td>Negativo</td>
            </tr>
            <tr>
                <td>Celulas de transicion</td>
                <td><input type="text" required style="width: 100%" name="d17"></td>
                <td>Negativo</td>
                <td>Granuloso</td>
                <td><input type="text" required style="width: 100%" name="d18"></td>
                <td>Negativo</td>
            </tr>
            <tr>
                <td>Celulas clave</td>
                <td><input type="text" required style="width: 100%" name="d19"></td>
                <td>Negativo</td>
                <td>Epiteliales</td>
                <td><input type="text" required style="width: 100%" name="d20"></td>
                <td>Negativo</td>
            </tr>
            <tr>
                <td>Leucocitos</td>
                <td><input type="text" required style="width: 100%" name="d21"></td>
                <td>Hasta 5/c</td>
                <td>Eritrocitario</td>
                <td><input type="text" required style="width: 100%" name="d22"></td>
                <td>Negativo</td>
            </tr>
            <tr>
                <td>Eritrocitos</td>
                <td><input type="text" required style="width: 100%" name="d23"></td>
                <td>Hasta 3/c</td>
                <td>Leucositario</td>
                <td><input type="text" required style="width: 100%" name="d24"></td>
                <td>Negativo</td>
            </tr>
            <tr>
                <td>Bacterias</td>
                <td><input type="text" required style="width: 100%" name="d25"></td>
                <td>Escaso</td>
                <td>Cereos</td>
                <td><input type="text" required style="width: 100%" name="d26"></td>
                <td>Negativo</td>
            </tr>
            <tr>
                <td>CRISTALES</td>
                <td colspan="2"></td>
                <td>Mixtos</td>
                <td><input type="text" required style="width: 100%" name="d27"></td>
                <td>Negativo</td>
            </tr>
            <tr>
                <td>Uratos amorfos</td>
                <td><input type="text" required style="width: 100%" name="d28"></td>
                <td>Escasos</td>
                <td colspan="3">OTROS</td>
            </tr>
            <tr>
                <td>Fosfato amorfo</td>
                <td><input type="text" required style="width: 100%" name="d29"></td>
                <td>Escasos</td>
                <td>Filamento mucoso</td>
                <td colspan="2"><input type="text" required style="width: 100%" name="d30"></td>
            </tr>
            <tr>
                <td>Oxalato de calcio</td>
                <td><input type="text" required style="width: 100%" name="d31"></td>
                <td>Escasos</td>
                <td>Piocitos</td>
                <td colspan="2"><input type="text" required style="width: 100%" name="d32"></td>
            </tr>
            <tr>
                <td>Fosfato de calcio</td>
                <td><input type="text" required style="width: 100%" name="d33"></td>
                <td>Escasos</td>
                <td>Levaduras</td>
                <td colspan="2"><input type="text" required style="width: 100%" name="d34"></td>
            </tr>
            <tr>
                <td>Acido Urico</td>
                <td><input type="text" required style="width: 100%" name="d35"></td>
                <td>Escasos</td>
                <td>Esporas micoticas</td>
                <td colspan="2"><input type="text" required style="width: 100%" name="d36"></td>
            </tr>
            <tr>
                <td>OBSERVACIONES</td>
                <td colspan="5"><input type="text" required style="width: 100%" name="d37"></td>
            </tr>
            <tr>
                <td rowspan="4">RESPONSABLE</td>
                <td colspan="2" rowspan="4">{{Auth::user()->name}}</td>
            </tr>
            <tr>
                <td colspan="2">FECHA DE TOMA DE MUESTRAS</td>
                <td><input type="date" value="{{date('Y-m-d')}}" required style="width: 100%" name="fechatoma"></td>
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
