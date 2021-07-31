<?php

namespace App\Http\Controllers;

use App\Models\Serologia;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Doctor;
use Illuminate\Support\Facades\App;
class SerologiaController extends Controller
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
        //
        if (Doctor::where('nombre',$request->requerido)->get()->count()==0 && $request->requerido!=''){
            Doctor::create(['nombre'=>$request->requerido]);
        }
        $input=$request->all();
        $input['user_id']=Auth::user()->id;
        $dato=serologia::create($input);
        $input='';
        $pdf = App::make('dompdf.wrapper');
        $pdf->loadHTML($this->generar($dato->id));
        return $pdf->download('seroloiga.pdf');
        //return redirect('/pacientes');
    }

    public function generar($id){
        $row= serologia::with('paciente')->with('user')
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
        <table border="1" style="width: 100%;color: black">
            <tr>
                <td colspan="3" style="text-align: center"><h3>SEROLOGIA</h3></td>
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
        <br>
        <table border="1" style="width: 100%;color: black">
            <tr>
                <td colspan="4" style="text-align: center ">PRUEBA ANTICUERPOS CUANTITATIVOS ANTI SARS COV-2 lg M / lg G</td>
            </tr>
            <tr>
                <td style="text-align:center; color:red;" >lgM</td>
                <td >'.$row->lgm.'</td>
                <td >'.$row->d1.'</td>
                <td> menor a 0.9 NEGATIVO PARA lgG/lgM</td>
            </tr>
            <tr>
                <td></td>
                <td></td>
                <td></td>
                <td> 0.9 menor igual & mayor 1.1 INDETERMINADO </td>
            </tr>
            <tr>
                <td style="text-align:center; color:red;" >lgG</td>
                <td >'.$row->lgg.'</td>
                <td >'.$row->d2.'</td>
                <td style="width: 20%"> mayor igual 1.1 POSITIVO lgG/lgM</td>
            </tr>

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
                <td class="text-left text-red">OBSERVACIONES</td>
                <td colspan="3" >'.$row->d3.'</td>
            </tr>

            <tr >
                <td colspan="2" rowspan="2" >RESPONSABLE: '.$row->user->name.'</td>

                <td colspan="2">
                    FECHA DE TOMA DE MUESTRAS: '.$row->fechatoma.'
                </td>
            </tr>
            <tr>
                <td colspan="2">
                    FECHA DE ENTREGA DE MUESTRAS
                    '.date('Y-m-d').'
                </td>
            </tr>
        </table>

            ';
        return $cadena;
    }
    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Serologia  $serologia
     * @return \Illuminate\Http\Response
     */
    public function show(Serologia $serologia)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Serologia  $serologia
     * @return \Illuminate\Http\Response
     */
    public function edit(Serologia $serologia)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Serologia  $serologia
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Serologia $serologia)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Serologia  $serologia
     * @return \Illuminate\Http\Response
     */
    public function destroy(Serologia $serologia)
    {
        //
    }
}
