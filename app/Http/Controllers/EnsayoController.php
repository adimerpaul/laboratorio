<?php

namespace App\Http\Controllers;

use App\Models\Ensayo;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\Doctor;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\App;

class EnsayoController extends Controller
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
        $dato=ensayo::create($input);

        $pdf = App::make('dompdf.wrapper');
        $pdf->loadHTML($this->generar($dato->id));
        return $pdf->download('ejemplo.pdf');
        return redirect('/pacientes');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Ensayo  $ensayo
     * @return \Illuminate\Http\Response
     */
    public function show($paciente_id)
    {
        //

    }

    public function datos(Request $request ){
        $pdf = App::make('dompdf.wrapper');
        $pdf->loadHTML($this->generar());
        return $pdf->download('ejemplo.pdf');


        return DB::table('ensayos')
        ->join('users','users.id','=','ensayos.user_id')
        ->join('pacientes','pacientes.id','=','ensayos.paciente_id')
        ->where('id',1)
        ->get();

    
    }

    public function generar($id){
        $row=DB::table('ensayos')
        ->join('users','users.id','=','ensayos.user_id')
        ->join('pacientes','pacientes.id','=','ensayos.paciente_id')
        ->where('id',$id)
        ->get();

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
                    <td colspan="3" style="text-align: center; border:0"><h3></h3></td>
                    <td>Form. 010</td>
                </tr>
                <tr>
                    <td style="color: darkblue">PACIENTE</td>
                    <td><label class="txtnombre"></label></td>
                    <td style="color: darkblue">EDAD</td>
                    <td><label class="txtedad"></label></td>
                </tr>
                <tr>
                    <td style="color: darkblue">REQUERIDO POR</td>
                    <td><input type="text" style="width: 100%" name="requerido" placeholder="Requerido por" ></td>
                    <td style="color: darkblue">SEXO</td>
                    <td><label class="txtsexo"></label></td>
                </tr>
                <tr>
                    <td style="color: darkblue">METODO</td>
                    <td><input type="text" style="width: 100%" name="tipomuestra" placeholder="metodo" ></td>
                    <td style="color: darkblue">N PACIENTE</td>
                    <td><label class="txtn"></label> <input type="hidden" class="paciente_id" name="paciente_id"></td>
                </tr>
    
            </table>
            <br>
            <table border="1" style="width: 100%;color: black">
                <tr><td colspan="5" class="text-center text-red">
                    METODO: INMUNOENSAYO DE FLUORESCENCIA (FIA)
                    </td>
                </tr>
                <tr>
                    <td colspan="2" class="text-center text-red" ></td>
                    <td class="text-center text-blue" > UNIDAD</td>
                    <td class="text-center text-blue" >Tipo de Muestra</td>
                    <td class="text-center text-blue" >Valor Referencial</td>
                </tr>
                <tr>
                    <td class="text-left text-red" style="width: 20%">DIMEROS D</td>
                    <td ><input  type="text"  name="d1" ></td>
                    <td class="text-center text-blue">ng/ml</td>
                    <td class="text-center text-blue">Plasma Citratado</td>
                    <td class="text-center text-blue">Hasta 500 ng/ml</td>
                </tr>
    
                <tr>
                    <td rowspan="2" class="text-left text-red" style="width: 20%">FERRITINA</td>
                    <td rowspan="2"><input  type="text"  name="d2" ></td>
                    <td rowspan="2"class="text-center text-blue">ng/ml</td>
                    <td rowspan="2" class="text-center text-blue">Suero</td>
                    <td class="text-center text-blue">30-350 ng/ml Varon </td>
                </tr>  
                <tr>
                    <td class="text-center text-blue">20-250 ng/ml Mujer</td>
    
                </tr>
                <tr>
                    <td class="text-left text-red" style="width: 20%">IL-6</td>
                    <td ><input  type="text"  name="d3" ></td>
                    <td class="text-center text-blue">pg/ml</td>
                    <td class="text-center text-blue">Suero/plasma</td>
                    <td class="text-center text-blue">7 pg/ml</td>
                </tr>            
                <tr>
                    <td class="text-left text-red" style="width: 20%">PSA CUANTITATIVO</td>
                    <td ><input  type="text"  name="d4" ></td>
                    <td class="text-center text-blue">ng/ml</td>
                    <td class="text-center text-blue">Suero</td>
                    <td class="text-center text-blue">Menor a 4 ng/ml</td>
                </tr>            
                <tr>
                    <td class="text-left text-red" style="width: 20%">PCR CUANTITATIVO</td>
                    <td ><input  type="text"  name="d5" ></td>
                    <td class="text-center text-blue">mg/L</td>
                    <td class="text-center text-blue">Sangre Entera</td>
                    <td class="text-center text-blue">< 10 mg/L</td>
                </tr>            
                <tr>
                    <td class="text-left text-red" style="width: 20%">TROPONINA I</td>
                    <td ><input  type="text"  name="d6" ></td>
                    <td class="text-center text-blue">ng/ml</td>
                    <td class="text-center text-blue">Suero</td>
                    <td class="text-center text-blue">0.0 - 0.11 ng/ml</td>
                </tr>            
                <tr>
                    <td rowspan="2" class="text-left text-red" style="width: 20%">B - HCG</td>
                    <td rowspan="2"><input  type="text"  name="d7" ></td>
                    <td rowspan="2" class="text-center text-blue">mlU/ml</td>
                    <td rowspan="2" class="text-center text-blue">Suero</td>
                    <td class="text-center text-blue">Mujer No Embarazada < 10 mlU/ml </td>
                </tr>            
                <tr>
                    <td class="text-center text-blue">Mujer en postmenopausia < 10 mlU/ml</td>
                    
                </tr>
                <tr>
                    <td rowspan="4" class="text-left text-red" style="width: 20%">PROCALCITONINA</td>
                    <td rowspan="4" ><input  type="text"  name="d8" ></td>
                    <td rowspan="4" class="text-center text-blue">ng/ml</td>
                    <td rowspan="4"  class="text-center text-blue">Suero</td>
                    <td class="text-center text-blue">PCT < 0.5 Es posible infeccion Bacteriana Local</td>
                </tr>
                <tr>
                    <td class="text-center text-blue">PCT 0.5 - 2 Posible Infeccion </td>
                </tr>
                <tr>
                    <td class="text-center text-blue">PCT 2 - 10 Es muy Probable Infeccion (sepsis) a menos que se conozcan otras causas </td>
                </tr>
                <tr>
                    <td class="text-center text-blue">PCT > 10 Sepsis Bacteriana severa o shock septico </td>
                </tr>
                <tr>
                    <td colspan="6"></td>
                </tr>
    
                <tr >
                    <td colspan="2" rowspan="2" >RESPONSABLE: {{Auth::user()->name}}</td>
                    <td colspan="3">
                        FECHA DE TOMA DE MUESTRAS
                        <input placeholder="00" type="date" value="{{date("Y-m-d")}}"  style="width: 100%" name="fechatoma">
                    </td>
                </tr>
                <tr>
                    <td colspan="3">
                        FECHA DE ENTREGA DE MUESTRAS
                        <input placeholder="00" type="date" value="{{date("Y-m-d")}}"  style="width: 100%" name="fechaentrega">
                    </td>
                </tr>
                <tr>
                    <td colspan="6">
                        <button class="btn btn-success btn-block"><i class="fa fa-save"></i> REGISTRAR</button>
                    </td>
                </tr>
            </table>';
            return $cadena;
    

    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Ensayo  $ensayo
     * @return \Illuminate\Http\Response
     */
    public function edit(Ensayo $ensayo)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Ensayo  $ensayo
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Ensayo $ensayo)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Ensayo  $ensayo
     * @return \Illuminate\Http\Response
     */
    public function destroy(Ensayo $ensayo)
    {
        //
    }
}
