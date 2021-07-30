<?php

namespace App\Http\Controllers;

use App\Models\Doctor;
use App\Models\Orina;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\App;

class OrinaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        if (Doctor::where('nombre',$request->requerido)->get()->count()==0 && $request->requerido!=''){
            Doctor::create(['nombre'=>$request->requerido]);
        }
        $dato=Orina::create($request->all()+ ['user_id' => Auth::user()->id]);
        $input='';
        $pdf = App::make('dompdf.wrapper');
        $pdf->loadHTML($this->generar($dato->id));
        return $pdf->download('orina.pdf');
        //return redirect('/pacientes');
    }

    public function generar($id){
        $row= Orina::with('paciente')->with('user')
        ->where('id',$id)
        ->get();
        $row=$row[0];
        $cadena='
        <style>
table, th, td {
  border: 1px solid black;
  border-collapse: collapse;
}
</style>
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
    <table  style="border:1; width: 100%;color: black">
        <tr>
            <td colspan="3" style="text-align: center"><h3>HEXAMEN GENERAL DE ORINA</h3></td>
            <td>Form. '.$row->id.'</td>
        </tr>
        <tr>
            <td style="color: darkblue">PACIENTE</td>
            <td>'.$row->paciente->nombre.'</td>
            <td style="color: darkblue">EDAD</td>
            <td>'.$row->paciente->age().'</td>
        </tr>
        <tr>
            <td style="color: darkblue">REQUERIDO POR</td>
            <td>'.$row->requerido.'</td>
            <td style="color: darkblue">SEXO</td>
            <td>'.$row->paciente->sexo.'</td>
        </tr>
        <tr>
            <td style="color: darkblue">TIPO MUESTRA</td>
            <td>'.$row->tipomuestra.'</td>

            <td style="color: darkblue">N PACIENTE</td>
            <td>'.$row->paciente->id.'</td>
        </tr>
    </table>
    <table style="border:1,solid; width: 100%;color: black">
        <tr>
            <td style="background-color:red; text-align:center; color:white;">EX. FISICO</td>
            <td style="background-color:red; text-align:center; color:white;">VALOR</td>
            <td>REFERENCIA</td>
            <td>EX. QUIMICO</td>
            <td style="background-color:red; text-align:center; color:white;">VALOR</td>
            <td>REFERENCIA</td>
        </tr>
        <tr>
            <td style="background-color:red; text-align:center; color:white;">Color</td>
            <td>'.$row->d1.'</td>
            <td>Amarillo</td>
            <td style="background-color:red; text-align:center; color:white;">Proteinas</td>
            <td>'.$row->d2.'</td>
            <td>Negativo</td>
        </tr>
        <tr>
            <td style="background-color:red; text-align:center; color:white;">Olor</td>
            <td>'.$row->d3.'</td>
            <td>Sui-generis</td>
            <td style="background-color:red; text-align:center; color:white;">Glucosa</td>
            <td>'.$row->d4.'</td>
            <td>Negativo</td>
        </tr>
        <tr>
            <td style="background-color:red; text-align:center; color:white;">Aspecto</td>
            <td>'.$row->d5.'</td>
            <td>Limpido o lig opal</td>
            <td style="background-color:red; text-align:center; color:white;">C. cetonicos</td>
            <td>'.$row->d6.'</td>
            <td>Negativo</td>
        </tr>
        <tr>
            <td style="background-color:red; text-align:center; color:white;">Espuma</td>
            <td>'.$row->d7.'</td>
            <td>Blanco fugaz</td>
            <td style="background-color:red; text-align:center; color:white;">Bilirrubina</td>
            <td>'.$row->d8.'</td>
            <td>Negativo</td>
        </tr>
        <tr>
            <td style="background-color:red; text-align:center; color:white;">Deposito</td>
            <td>'.$row->d9.'</td>
            <td>Nulo o escacaso</td>
            <td style="background-color:red; text-align:center; color:white;">Hemoglobina</td>
            <td>'.$row->d10.'</td>
            <td>Negativo</td>
        </tr>
        <tr>
            <td style="background-color:red; text-align:center; color:white;">Densidad</td>
            <td>'.$row->d11.'</td>
            <td>1.010-1.030</td>
            <td style="background-color:red; text-align:center; color:white;">Urobilina</td>
            <td>'.$row->d12.'</td>
            <td>Normal</td>
        </tr>
        <tr>
            <td style="background-color:red; text-align:center; color:white;">Reaccion</td>
            <td>'.$row->d13.'</td>
            <td>Lig. acida</td>
            <td style="background-color:red; text-align:center; color:white;">Nitrinos</td>
            <td>'.$row->d14.'</td>
            <td>Negativo</td>
        </tr>
        <tr>
            <td colspan="6" style="text-align: center">SEDIMENTO: EXAMEN MICROSCOPICO</td>
        </tr>
        <tr>
            <td style="background-color:red; text-align:center; color:white;">CELULAS</td>
            <td style="background-color:red; text-align:center; color:white;">VALOR</td>
            <td>REFERENCIA</td>
            <td>CILINDROS</td>
            <td style="background-color:red; text-align:center; color:white;">VALOR</td>
            <td>REFERENCIA</td>
        </tr>
        <tr>
            <td style="background-color:red; text-align:center; color:white;">Celulas epiteliales</td>
            <td'.$row->d15.'</td>
            <td>Hasta 2/c.</td>
            <td style="background-color:red; text-align:center; color:white;">Hialino</td>
            <td>'.$row->d16.'</td>
            <td>Negativo</td>
        </tr>
        <tr>
            <td style="background-color:red; text-align:center; color:white;">Celulas de transicion</td>
            <td>'.$row->d17.'</td>
            <td>Negativo</td>
            <td style="background-color:red; text-align:center; color:white;">Granuloso</td>
            <td>'.$row->d18.'</td>
            <td>Negativo</td>
        </tr>
        <tr>
            <td style="background-color:red; text-align:center; color:white;">Celulas clave</td>
            <td>'.$row->d19.'</td>
            <td>Negativo</td>
            <td style="background-color:red; text-align:center; color:white;">Epiteliales</td>
            <td>'.$row->d20.'</td>
            <td>Negativo</td>
        </tr>
        <tr>
            <td style="background-color:red; text-align:center; color:white;">Leucocitos</td>
            <td>'.$row->d21.'</td>
            <td>Hasta 5/c</td>
            <td style="background-color:red; text-align:center; color:white;">Eritrocitario</td>
            <td>'.$row->d22.'</td>
            <td>Negativo</td>
        </tr>
        <tr>
            <td style="background-color:red; text-align:center; color:white;">Eritrocitos</td>
            <td>'.$row->d23.'</td>
            <td>Hasta 3/c</td>
            <td style="background-color:red; text-align:center; color:white;">Leucositario</td>
            <td>'.$row->d24.'</td>
            <td>Negativo</td>
        </tr>
        <tr>
            <td style="background-color:red; text-align:center; color:white;">Bacterias</td>
            <td>'.$row->d25.'</td>
            <td>Escaso</td>
            <td style="background-color:red; text-align:center; color:white;">Cereos</td>
            <td>'.$row->d26.'</td>
            <td>Negativo</td>
        </tr>
        <tr>
            <td style="background-color:red; text-align:center; color:white;">CRISTALES</td>
            <td colspan="2"></td>
            <td style="background-color:red; text-align:center; color:white;">Mixtos</td>
            <td>'.$row->d27.'</td>
            <td>Negativo</td>
        </tr>
        <tr>
            <td style="background-color:red; text-align:center; color:white;">Uratos amorfos</td>
            <td>'.$row->d28.'</td>
            <td>Escasos</td>
            <td colspan="3">OTROS</td>
        </tr>
        <tr>
            <td style="background-color:red; text-align:center; color:white;">Fosfato amorfo</td>
            <td>'.$row->d29.'</td>
            <td>Escasos</td>
            <td style="background-color:red; text-align:center; color:white;">Filamento mucoso</td>
            <td colspan="2">'.$row->d30.'</td>
        </tr>
        <tr>
            <td style="background-color:red; text-align:center; color:white;">Oxalato de calcio</td>
            <td>'.$row->d31.'</td>
            <td>Escasos</td>
            <td style="background-color:red; text-align:center; color:white;">Piocitos</td>
            <td colspan="2">'.$row->d32.'</td>
        </tr>
        <tr>
            <td style="background-color:red; text-align:center; color:white;">Fosfato de calcio</td>
            <td>'.$row->d33.'</td>
            <td>Escasos</td>
            <td style="background-color:red; text-align:center; color:white;">Levaduras</td>
            <td colspan="2">'.$row->d34.'</td>
        </tr>
        <tr>
            <td style="background-color:red; text-align:center; color:white;">Acido Urico</td>
            <td>'.$row->d35.'</td>
            <td>Escasos</td>
            <td style="background-color:red; text-align:center; color:white;">Esporas micoticas</td>
            <td colspan="2">'.$row->d36.'</td>
        </tr>
        <tr>
            <td style="background-color:red; text-align:center; color:white;">OBSERVACIONES</td>
            <td colspan="5">'.$row->d37.'</td>
        </tr>
        <tr>
            <td rowspan="4">RESPONSABLE</td>
            <td colspan="2" rowspan="4">'.$row->user->name.'</td>
        </tr>
        <tr>
            <td colspan="2">FECHA DE TOMA DE MUESTRAS</td>
            <td>'.$row->fechatoma.'</td>
        </tr>
        <tr>
            <td colspan="2">FECHA DE ENTREGA DE MUESTRAS</td>
            <td>'.date("Y-m-d").'</td>
        </tr>
        <tr>
            <td colspan="2">HORA TOMA DE MUESTRA</td>
            <td>'.date('H:i:s').'</td>
        </tr>
        </table>
        ';
        return $cadena;
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Orina  $orina
     * @return \Illuminate\Http\Response
     */
    public function show(Orina $orina)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Orina  $orina
     * @return \Illuminate\Http\Response
     */
    public function edit(Orina $orina)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Orina  $orina
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Orina $orina)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Orina  $orina
     * @return \Illuminate\Http\Response
     */
    public function destroy(Orina $orina)
    {
        //
    }
}
