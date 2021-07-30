<?php

namespace App\Http\Controllers;

use App\Models\simple;
use Illuminate\Http\Request;
use App\Models\Doctor;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\App;
class SimpleController extends Controller
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
        $dato=simple::create($input);
        $input='';
        $pdf = App::make('dompdf.wrapper');
        $pdf->loadHTML($this->generar($dato->id));
        return $pdf->download('Simple.pdf');
        //return redirect('/pacientes');
    }
    public function generar($id){
        $row= simple::with('paciente')->with('user')
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
                <td colspan="3" style="text-align: center"><h3>COPRAPARASITOLOGICO SIMPLE</h3></td>
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
            <tr >
                <td colspan="2" style="text-align: center ">COPRAPARASITOLOGICO SIMPLE</td>
            </tr>
            <tr>
                <td style="color:red" >ASPECTO DE LA MUESTRA</td>
                <td >'.$row->d1.'</td>
            </tr>
            <tr>
                <td style="color:red" >COLOR</td>
                <td >'.$row->d2.'</td>
            </tr>
            <tr>
                <td style="color:red" >CELULAS EPITELIALES</td>
                <td >'.$row->d3.'</td>
            </tr>
            <tr>
                <td style="color:red" >LEUCOCITOS</td>
                <td >'.$row->d4.'</td>
            </tr>
            <tr>
                <td style="color:red" >HEMATIES</td>
                <td >'.$row->d5.'</td>
            </tr>
            <tr>
                <td style="color:red" >GRASAS</td>
                <td >'.$row->d6.'</td>
            </tr>
            <tr>
                <td style="color:red" >LEVADURAS</td>
                <td >'.$row->d7.'</td>
            </tr>
            <tr>
                <td style="color:red" >ESPORAS MICOTICAS</td>
                <td >'.$row->d8.'</td>
            </tr>
            <tr>
                <td style="color:red" >ALMIDON</td>
                <td >'.$row->d9.'</td>
            </tr>
            <tr>
                <td style="color:red" >PARASITOS</td>
                <td >'.$row->d10.'</td>
            </tr>
            <tr>
                <td style="color:red" >PIOCITOS</td>
                <td >'.$row->d11.'</td>
            </tr>

            <tr>
                <td rowspan="2" style="color:red" >MOCO FECAL:
                <span style="color:black">'.$row->d12.'</span>               </td>
                <td> Polimorfonucleares: <span style="color:black">'.$row->d13.'</span></td>

            </tr>
            <tr>
                <td>Mononucleares: <span style="color:black">'.$row->d14.'</span> </td>
                
            </tr>
            <tr>
                <td style="color:red" >OBSERVACIONES</td>
                <td >'.$row->d15.'</td>
            </tr>

            <tr colspan="2">
                <td colspan="2" style="text-align:center">OTROS</td>
            </tr>
            <tr>
                <td style="color:red" >SANGRE OCULTA EN HECES</td>
                <td >'.$row->d16.'</td>
            </tr>
            <tr>
                <td style="color:red" >TEST DE BENEDICT</td>
                <td >'.$row->d17.'</td>
            </tr>  
  
            <tr>
                <td style="color:red" >OBSERVACIONES</td>
                <td >'.$row->d18.'</td>
            </tr>

            <tr>
                <td rowspan="2" >RESPONSABLE: '.$row->user->name.'</td>

                <td>
                    FECHA DE TOMA DE MUESTRAS : '.$row->fechatoma.'
                    
                </td>
            </tr>
            <tr>

                <td>
                    FECHA DE ENTREGA DE MUESTRAS : '.$row->fechatoma.'
                    
                </td>
            </tr>

        </table>
            ';
            return $cadena;
        }
    /**
     * Display the specified resource.
     *
     * @param  \App\Models\simple  $simple
     * @return \Illuminate\Http\Response
     */
    public function show(simple $simple)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\simple  $simple
     * @return \Illuminate\Http\Response
     */
    public function edit(simple $simple)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\simple  $simple
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, simple $simple)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\simple  $simple
     * @return \Illuminate\Http\Response
     */
    public function destroy(simple $simple)
    {
        //
    }
}
