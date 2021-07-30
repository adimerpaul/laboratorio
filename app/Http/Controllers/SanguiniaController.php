<?php

namespace App\Http\Controllers;

use App\Models\Doctor;
use App\Models\Hemograma;
use App\Models\sanguinia;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\App;
class SanguiniaController extends Controller
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
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
//        return $request->requerido;
        if (Doctor::where('nombre',$request->requerido)->get()->count()==0 && $request->requerido!=''){
            Doctor::create(['nombre'=>$request->requerido]);
        }
        $input=$request->all();
        $input['user_id']=Auth::user()->id;
        $input['fechatoma']=date('Y-m-d');
        $dato=sanguinia::create($input);
        $input='';
        $pdf = App::make('dompdf.wrapper');
        $pdf->loadHTML($this->generar($dato->id));
        return $pdf->download('sanguinea.pdf');
        //return redirect('/pacientes');
    }
    public function generar($id){
        $row= sanguinia::with('paciente')->with('user')
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
        <table  style="border=1; width: 100%;color: black">
            <tr>
                <td colspan="3" style="text-align: center"><h3>QUIMICA SANGUINEA</h3></td>
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
        <table style="border:"1"; width: 100%;color: black">
            <tr style="color:white; background-color:purple">
                <th>PRUEBA</th>
                <th>VALOR</th>
                <th>REFERENCIA</th>
                <th>METODO</th>
                <th>PRUEBA</th>
                <th>VALOR</th>
                <th>VALOR</th>
                <th>METODO</th>
            </tr>
            <tr>
                <td style="color:white; background-color:red;" >Glicemia</td>
                <td>'.$row->d1.'</td>
                <td>70-105mg/dl</td>
                <td>Glucosa Oxidasa</td>
                <td style="color:white; background-color:red; text-align:center;">Fosfatasa alcalina</td>
                <td>'.$row->d2.'</td>
                <td>adultos hasta 100UI/L</td>
                <td>Cinetico</td>
            </tr>
            <tr>
                <td style="color:white; background-color:red; text-align:center;">Creatinina</td>
                <td>'.$row->d3.'</td>
                <td>0.7-1.5mg/dl</td>
                <td>Picrato Alcalino</td>
                <td style="color:white; background-color:red; text-align:center;">Fosfatasa alcalina</td>
                <td>'.$row->d4.'</td>
                <td>niños 100-400UI/L</td>
                <td>Cinetico</td>
            </tr>
            <tr>
                <td style="color:white; background-color:red; text-align:center;">Urea</td>
                <td>'.$row->d5.'</td>
                <td>15-45mg/dl</td>
                <td>Enzimatico UV</td>
                <td style="color:white; background-color:red; text-align:center;">Transamisas GOT</td>
                <td>'.$row->d6.'</td>
                <td>hasta 40UI/L</td>
                <td>Cinetico</td>
            </tr>
            <tr>
                <td style="color:white; background-color:red; text-align:center;">NUS-BUN</td>
                <td>'.$row->d7.'</td>
                <td>7-18mg/dl</td>
                <td>Cinetico UV</td>
                <td style="color:white; background-color:red; text-align:center;">Transamisas GPT</td>
                <td>'.$row->d8.'</td>
                <td>hasta 41UI/L</td>
                <td>Cinetico</td>
            </tr>
            <tr>
                <td style="color:white; background-color:red; text-align:center;">Acido Urico</td>
                <td>'.$row->d9.'</td>
                <td>2.6-7.2mg/dl</td>
                <td>Uricasa/Peroxidasa</td>
                <td style="color:white; text-align:center; background-color:purple;">LIPIDOGRAMA</td>
                <td></td>
                <td></td>
                <td></td>
            </tr>
            <tr>
                <td style="color:white; background-color:red; text-align:center;">Proteinas Totales</td>
                <td>'.$row->d10.'</td>
                <td>6.2-8.5g/dl</td>
                <td>Biuret</td>
                <td style="color:white; background-color:red; text-align:center;">Trigliceridos</td>
                <td>'.$row->d11.'</td>
                <td>40-160mg/dl</td>
                <td>GPO-PAP</td>
            </tr>
            <tr>
                <td style="color:white; background-color:red; text-align:center;">Albumina</td>
                <td>'.$row->d12.'</td>
                <td>3.5-5.3g/dl</td>
                <td>Verde Bromocresol</td>
                <td style="color:white; background-color:red; text-align:center;">Colesterol Total</td>
                <td>'.$row->d13.'</td>
                <td>menor 200mg/dl</td>
                <td>CHOD-PAP</td>
            </tr>
            <tr>
                <td style="color:white; background-color:red; text-align:center;">Globulina</td>
                <td>'.$row->d14.'</td>
                <td>2.8-3.5g/dl</td>
                <td></td>
                <td style="color:white; background-color:red; text-align:center;">HDL-Col.</td>
                <td>'.$row->d15.'</td>
                <td>35-65mg/dl</td>
                <td>CHOD-PAP</td>
            </tr>
            <tr>
                <td style="color:white; background-color:red; text-align:center;">Amilasa</td>
                <td>'.$row->d16.'</td>
                <td>menor a 120 UI/L</td>
                <td>Enzimatico a Amilasa</td>
                <td style="color:white; background-color:red; text-align:center;">LDL-Col.</td>
                <td>'.$row->d17.'</td>
                <td>Hasta 150mg/dl</td>
                <td>CHOD-PAP</td>
            </tr>
            <tr>
                <td style="color:white; background-color:red; text-align:center;">Lipasa</td>
                <td>'.$row->d18.'</td>
                <td>10-150UI/L</td>
                <td>Enzimatica Colorimetrica</td>
                <td style="background-color:purple; text-align:center; color:white;" >ELECTROLITOS</td>
                <td></td>
                <td></td>
                <td></td>
            </tr>
            <tr>
                <td style="color:white; background-color:red; text-align:center;">Bilirrubina Total</td>
                <td>'.$row->d19.'</td>
                <td>hasta 1.2 mg/dl</td>
                <td rowspan="3">Acido Sulfanilico con Diaazo</td>
                <td style="color:white; background-color:red; text-align:center;">Sodio</td>
                <td>'.$row->d20.'</td>
                <td>135-155 mEq/L</td>
                <td rowspan="4">Automatizado CORNLEY AFT-500</td>
            </tr>
            <tr>
                <td style="color:white; background-color:red; text-align:center;">Bilirrubina Directa</td>
                <td>'.$row->d21.'</td>
                <td>hasta 0.3 mg/dl</td>
                <td style="color:white; background-color:red; text-align:center;">Cloro</td>
                <td'.$row->d22.'></td>
                <td>98-106 mEq/L</td>
            </tr>
            <tr>
                <td style="color:white; background-color:red; text-align:center;">Bilirrubina Inderecta</td>
                <td>'.$row->d23.'</td>
                <td>hasta 0.9 mg/dl</td>
                <td style="color:white; background-color:red; text-align:center;">Potasio</td>
                <td>'.$row->d24.'</td>
                <td>3.4-5.3 mEq/L</td>
            </tr>
            <tr>
                <td style="color:white; background-color:red; text-align:center;">CK-MB</td>
                <td>'.$row->d25.'</td>
                <td>0-24 UI/L</td>
                <td>Enzimatico </td>
                <td style="color:white; background-color:red; text-align:center;">Calcio</td>
                <td>'.$row->d26.'</td>
                <td>8.5-10.5mg/dl</td>
            </tr>
            <tr>
                <td style="color:white; background-color:red; text-align:center;">LDH</td>
                <td>'.$row->d27.'</td>
                <td>200-480UI/L</td>
                <td>Piruvato Lactato</td>
                <td style="color:white; background-color:red; text-align:center;">Magnesio</td>
                <td>'.$row->d28.'</td>
                <td>1.7-2.4mg/dl</td>
                <td>Colorimetrico calmagita</td>
            </tr>
            <tr>
                <td style="color:white; background-color:red; text-align:center;">Hierro</td>
                <td>'.$row->d29.'</td>
                <td>50-170ug/dl</td>
                <td>Goodwing Modificado</td>
                <td style="color:white; background-color:red; text-align:center;">Fosforo</td>
                <td>'.$row->d30.'</td>
                <td>2.5-4.5mg/dl</td>
                <td>Fosfomolibdato UV</td>
            </tr>
            <tr>
                <td colspan="2" style="background-color:blue; text-align:center; color:white;">OBSERVACIONES</td>
                <td colspan="6">'.$row->d31.'</td>
            </tr>
            <tr>
                <td colspan="2" rowspan="2" style="background-color:blue; text-align:center; color:white;">RESPONSABLE</td>
                <td colspan="2" rowspan="2">
                    '.$row->user->name.'
                </td>
                <td colspan="3" style="background-color:blue; text-align:center; color:white;">FECHA TOMA DE MUESTRA</td>
                <td>'.$row->fechatoma.'</td>
            </tr>
            <tr>
                <td colspan="3" style="background-color:blue; text-align:center; color:white;">FECHA DE ENTREGA DE RESULTADO</td>
                <td>'.$row->fechatoma.'</td>
            </tr>
        </table>
        ';
        return $cadena;
    }
    /**
     * Display the specified resource.
     *
     * @param  \App\Models\sanguinia  $sanguinia
     * @return \Illuminate\Http\Response
     */
    public function show(sanguinia $sanguinia)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\sanguinia  $sanguinia
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, sanguinia $sanguinia)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\sanguinia  $sanguinia
     * @return \Illuminate\Http\Response
     */
    public function destroy(sanguinia $sanguinia)
    {
        //
    }
}
