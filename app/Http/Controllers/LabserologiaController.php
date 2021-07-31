<?php

namespace App\Http\Controllers;

use App\Models\Labserologia;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Doctor;
use Illuminate\Support\Facades\App;
class LabserologiaController extends Controller
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
        $dato=labserologia::create($input);
        $input='';
        $pdf = App::make('dompdf.wrapper');
        $pdf->loadHTML($this->generar($dato->id));
        return $pdf->download('lab.pdf');
        //return redirect('/pacientes');
    }
    public function generar($id){
        $row= labserologia::with('paciente')->with('user')
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
                <td colspan="2" style="text-align:center; color:red;"  ></td>
                <td style="text-align:center; color:red;" > Valor referencial</td>
                <td style="text-align:center; color:red;" >Metodo de Prueba</td>
            </tr>
            <tr>
                <td style="color:red; width: 20%">Factor Reumatoide(Latex)</td>
                <td >'.$row->d1.'</td>
                <td style="text-align:center; color:blue;" >Hasta 8 UI/ml</td>
                <td style="text-align:center; color:blue;">Aglutinacion directa</td>
            </tr>
            <tr>
                <td style="color:red; width: 20%">Antiestreptolisina</td>
                <td >'.$row->d2.'</td>
                <td style="text-align:center; color:blue;">Hasta 200 UI/l</td>
                <td style="text-align:center; color:blue;">Aglutinacion directa</td>
            </tr>
            <tr>
                <td style="color:red; width: 20%">Proteina C Reactiva</td>
                <td >'.$row->d3.'</td>
                <td style="text-align:center; color:blue;">Hasta 0.8 mg/dl</td>
                <td style="text-align:center; color:blue;">Aglutinacion directa</td>
            </tr>
            <tr>
                <td style="color:red; width: 20%">RPR</td>
                <td >'.$row->d4.'</td>
                <td style="text-align:center; color:blue;">No Reactivo</td>
                <td style="text-align:center; color:blue;">Floculacion directa </td>
            </tr>
            <tr>
                <td style="color:red; width: 20%">Prueba Rapida Sifilis</td>
                <td >'.$row->d5.'</td>
                <td style="text-align:center; color:blue;">No Reactivo</td>
                <td style="text-align:center; color:blue;">Prueba Rapida Inmunocromatografica</td>
            </tr>
            <tr>
                <td style="color:red; width: 20%">Prueba Rapida VIH</td>
                <td >'.$row->d6.'</td>
                <td style="text-align:center; color:blue;">No Reactivo</td>
                <td style="text-align:center; color:blue;">Prueba Rapida Inmunocromatografica</td>
            </tr>
            <tr>
                <td style="color:red; width: 20%">Hepatitis A</td>
                <td >'.$row->d7.'</td>
                <td style="text-align:center; color:blue;">NEGATIVO / POSITIVO</td>
                <td style="text-align:center; color:blue;">Prueba Rapida Inmunocromatografica</td>
            </tr>
            <tr>
                <td style="color:red; width: 20%">Hepatitis B</td>
                <td >'.$row->d8.'</td>
                <td style="text-align:center; color:blue;">NEGATIVO / POSITIVO</td>
                <td style="text-align:center; color:blue;">Prueba Rapida Inmunocromatografica</td>
            </tr>
            <tr>
                <td style="color:red; width: 20%">Hepatitis C</td>
                <td >'.$row->d9.'</td>
                <td style="text-align:center; color:blue;">NEGATIVO / POSITIVO</td>
                <td style="text-align:center; color:blue;">Prueba Rapida Inmunocromatografica</td>
            </tr>
            <tr>
                <td style="color:red; width: 20%">Helicobacter Pylori en Sangre</td>
                <td >'.$row->d10.'</td>
                <td style="text-align:center; color:blue;">NEGATIVO / POSITIVO</td>
                <td style="text-align:center; color:blue;">Prueba Rapida Inmunocromatografica</td>
            </tr>
            <tr>
                <td style="color:red; width: 20%">Helicobacter Pylori en Heces</td>
                <td >'.$row->d11.'</td>
                <td style="text-align:center; color:blue;">NEGATIVO / POSITIVO</td>
                <td style="text-align:center; color:blue;">Prueba Rapida Inmunocromatografica</td>
            </tr>
            <tr>
                <td style="color:red; width: 20%">Troponina I</td>
                <td >'.$row->d12.'</td>
                <td style="text-align:center; color:blue;">NEGATIVO / POSITIVO</td>
                <td style="text-align:center; color:blue;">Prueba Rapida Inmunocromatografica</td>
            </tr>
            <tr>
                <td style="color:red; width: 20%">PSA</td>
                <td >'.$row->d13.'</td>
                <td style="text-align:center; color:blue;">Hasta 4 ng/ml</td>
                <td style="text-align:center; color:blue;">Prueba Rapida Semicuantitativo</td>
            </tr>
            <tr>
                <td style="color:red;">OBSERVACIONES</td>
                <td colspan="3" >'.$row->d14.'</td>
            </tr>

            <tr >
                <td colspan="2" rowspan="2" >RESPONSABLE: '.$row->user->name.'</td>

                <td colspan="2">
                    FECHA DE TOMA DE MUESTRAS: '.$row->fechatoma.'
                    
                </td>
            </tr>
            <tr>

                <td colspan="2">
                    FECHA DE ENTREGA DE MUESTRAS: 
                    '.$row->fechatoma.'
                </td>
            </tr>

        </table>

            ';
        return $cadena;
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Labserologia  $labserologia
     * @return \Illuminate\Http\Response
     */
    public function show(Labserologia $labserologia)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Labserologia  $labserologia
     * @return \Illuminate\Http\Response
     */
    public function edit(Labserologia $labserologia)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Labserologia  $labserologia
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Labserologia $labserologia)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Labserologia  $labserologia
     * @return \Illuminate\Http\Response
     */
    public function destroy(Labserologia $labserologia)
    {
        //
    }
}
