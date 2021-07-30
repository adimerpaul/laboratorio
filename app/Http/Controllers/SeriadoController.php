<?php

namespace App\Http\Controllers;

use App\Models\Doctor;
use App\Models\seriado;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
class SeriadoController extends Controller
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
        $dato=seriado::create($input);
        $input='';
        $pdf = App::make('dompdf.wrapper');
        $pdf->loadHTML($this->generar($dato->id));
        return $pdf->download('sanguinea.pdf');
        return redirect('/pacientes');
    }

    public function generar($id){
        $row= seriado::with('paciente')->with('user')
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
                <td colspan="3" style="text-align: center"><h3>COPROPARASITOLOGICO SERIADO</h3></td>
                <td>Form. 008</td>
            </tr>
            <tr>
                <td style="color: darkblue">PACIENTE</td>
                <td>'.$row->paciente->name.'</td>
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
                <td colspan="3" style="text-align: center ">COPROPARASITOLOGICO SERIADO</td>
            </tr>
            <tr>
                <td colspan="2" style="text-align:center; color:red; width: 20%">1 MUESTRA</td>
                <td >'.$row->muestra1.'</td>
            </tr>
            <tr>
                <td style="text-align:center; color:red;">Fecha</td>
                <td >'.$row->fecha1.'</td>
            </tr>
            <tr>
                <td style="text-align:center; color:red;">Hora</td>
                <td >'.$row->hora1.'</td>
            </tr>
            <tr>
                <td colspan="2" style="text-align:center; color:red; width: 20%">2 MUESTRA</td>
                <td >'.$row->muestra2.'</td>
            </tr>
            <tr>
                <td style="text-align:center; color:red;">Fecha</td>
                <td >'.$row->fecha2.'</td>
            </tr>
            <tr>
                <td style="text-align:center; color:red;">Hora</td>
                <td >'.$row->hora2.'</td>
            </tr>
            <tr>
                <td colspan="2" style="text-align:center; color:red; width: 20%">3 MUESTRA</td>
                <td >'.$row->muestra3.'</td>
            </tr>
            <tr>
                <td style="text-align:center; color:red;">Fecha</td>
                <td >'.$row->fecha3.'</td>
            </tr>
            <tr>
                <td style="text-align:center; color:red;">Hora</td>
                <td >'.$row->hora3.'</td>
            </tr>
            <tr>
                <td colspan="2" style="text-align:center; color:red;">OBSERVACIONES</td>
                <td >'.$row->observaciones.'</td>
            </tr>

            <tr >
                <td colspan="2" >RESPONSABLE: '.$row->user->name.'</td>

                <td>
                    FECHA DE ENTREGA RESULTADOS: '.date('Y-m-d').'
                </td>
            </tr>

        </table>

            ';
        return $cadena;
    }
    /**
     * Display the specified resource.
     *
     * @param  \App\Models\seriado  $seriado
     * @return \Illuminate\Http\Response
     */
    public function show(seriado $seriado)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\seriado  $seriado
     * @return \Illuminate\Http\Response
     */
    public function edit(seriado $seriado)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\seriado  $seriado
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, seriado $seriado)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\seriado  $seriado
     * @return \Illuminate\Http\Response
     */
    public function destroy(seriado $seriado)
    {
        //
    }
}
