<?php

namespace App\Http\Controllers;

use App\Models\Reserologia;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Doctor;
use Illuminate\Support\Facades\App;
class ReserologiaController extends Controller
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
        $input['fechatoma']=date('Y-m-d');
        $dato=reserologia::create($input);
        $input='';
        $pdf = App::make('dompdf.wrapper');
        $pdf->loadHTML($this->generar($dato->id));
        //return $this->generar($dato->id);
        return $pdf->download('Resultado.pdf');
        //return redirect('/pacientes');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Reserologia  $reserologia
     * @return \Illuminate\Http\Response
     */

    public function generar($id){
        $row= Reserologia::with('paciente')->with('user')
        ->where('id',$id)
        ->get();
        $row=$row[0];
        $cadena='
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
                <td style="text-align:center"> '.$row->requerido.'</td>
                <td style="color: darkblue">SEXO</td>
                <td style="text-align:center">'.$row->paciente->sexo.'</td>
            </tr>
            <tr>
                <td style="color: darkblue">TIPO MUESTRA</td>
                <td style="text-align:center">'.$row->tipomuestra.'</td>
                <td style="color: darkblue">N PACIENTE</td>
                <td style="text-align:center; color:red">'.$row->paciente->id.'</td>
            </tr>

        </table>
        <br>
        <table border="1" style="width: 100%;color: black">
            <tr>
                <td colspan="4" style="text-align: center; color:red;">PRUEBA RAPIDA ANTIGENOS SARS COV 2</td>
            </tr>

            <tr>
                <td colspan="4" style="text-align: center ">METODO: INMUNOGRAMATOGRAFIA CUALITATIVA</td>
            </tr>

            <tr>
                <td style="border:0; width: 20%"></td>
                <td style="text-align:center; color:red; style="width: 20%">ANTIGENO <br> SARS COV2</td>
                <td style="text-align:center">'.$row->d1.'</td>
                <td  style="border:0; width: 20%"></td>
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
                <td style="color:red">OBSERVACIONES</td>
                <td colspan="3" >'.$row->d2.'</td>
            </tr>

            <tr >
                <td colspan="2" rowspan="2" >RESPONSABLE: '.$row->user->name.'</td>
                <td colspan="2">
                    FECHA DE TOMA DE MUESTRAS: '.$row->fechatoma.'
                </td>
            </tr>
            <tr>
                <td colspan="2">
                    FECHA DE ENTREGA DE MUESTRAS: '.$row->fechatoma.'
                </td>
            </tr>

        </table>


        ';
        return $cadena;
    }

    public function show(Reserologia $reserologia)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Reserologia  $reserologia
     * @return \Illuminate\Http\Response
     */
    public function edit(Reserologia $reserologia)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Reserologia  $reserologia
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Reserologia $reserologia)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Reserologia  $reserologia
     * @return \Illuminate\Http\Response
     */
    public function destroy(Reserologia $reserologia)
    {
        //
    }
}
