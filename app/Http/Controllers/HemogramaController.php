<?php

namespace App\Http\Controllers;

use App\Models\Doctor;
use App\Models\Hemograma;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\App;

class HemogramaController extends Controller
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
//        echo "Hola soy sotre de homograma";
//        exit;
//        $datos=$request->all();
//        $datos->user_id=Auth::user()->id;
////        array_push($datos,array('user_id'=>1));
//        return $request->requerido;
        if (Doctor::where('nombre',$request->requerido)->get()->count()==0 && $request->requerido!=''){
            Doctor::create(['nombre'=>$request->requerido]);
        }
        $dato=Hemograma::create($request->all()+ ['user_id' => Auth::user()->id]);
        $input='';
        $pdf = App::make('dompdf.wrapper');
        $pdf->loadHTML($this->generar($dato->id));
        return $pdf->download('Hemograma.pdf');
        //return redirect('/pacientes');
    }
    public function generar($id){
        $row= Hemograma::with('paciente')->with('user')
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
                <td colspan="3" style="text-align: center"><h3>HEMOGRAMA COMPLETO</h3></td>
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
            <tr>
                <td style="color: darkblue">METODO</td>
                <td colspan="3">
                    Contador Hematologico MINDRAY BC 5130
                    Hematocrito (Metodo Manual) Hemoglobina (Clanmetahemoglobina reactivo drabking)
                </td>
            </tr>
        </table>

        <table border="1" style="width: 100%;color: black">
            <tr>
                <td colspan="3"></td>
                <td>REFERENCIA</td>
                <td colspan="2"></td>
                <td>REFERENCIA</td>
            </tr>
            <tr>
                <td style="color:white; background-color:red;">Globulos Rojos</td>
                <td>'.$row->d1.'</td>
                <td>x10 <sup>12 </sup>/L</td>
                <td>Varon 5.1-5.7x10 <sup>12</sup>/L <br> Mujer 4.8-5.4x10 <sup>12</sup>/L</td>
                <td style="color:white; background-color:red;">Tiempo de cuagulacion</td>
                <td>'.$row->d2.'</td>
                <td>5-10 min</td>
            </tr>
            <tr>
                <td style="color:white; background-color:red;">Hemoglobina</td>
                <td>'.$row->d3.'</td>
                <td>g/L</td>
                <td>Varon 151-175 g/L <br> Mujer Mujer 141-165 g/L</td>
                <td style="color:white; background-color:red;">Tiempo de sangria</td>
                <td>'.$row->d4.'</td>
                <td>1-3 min</td>
            </tr>
            <tr>
                <td style="color:white; background-color:red;">Hematocrito</td>
                <td>'.$row->d5.'</td>
                <td>L/L</td>
                <td>Varon 0.51-0.57 L/L <br> Mujer 0.46-0.53 L/L</td>
                <td style="color:white; background-color:red;">Tiempo de Protrombina</td>
                <td>'.$row->d6.'</td>
                <td>12-13 seg</td>
            </tr>
            <tr>
                <td style="color:white; background-color:red;">V.E.S.</td>
                <td>'.$row->d7.'</td>
                <td>mm.</td>
                <td>Varon 15 mm/hora <br> Mujer 20 mm/hora</td>
                <td style="color:white; background-color:red;">% Actividad</td>
                <td>'.$row->d8.'</td>
                <td>95-100%</td>
            </tr>

            <tr>
                <td style="color:white; background-color:red;">V.C.M.</td>
                <td>'.$row->d9.'</td>
                <td>ft.</td>
                <td>Varon 83.0-97.0 ft</td>
                <td style="color:white; background-color:red;">INR</td>
                <td>'.$row->d10.'</td>
                <td>0.97-1.04</td>
            </tr>
            <tr>
                <td style="color:white; background-color:red;">Hb.C.M.</td>
                <td>'.$row->d11.'</td>
                <td>pg.</td>
                <td>27.0-31.0 pg.</td>
                <td style="color:white; background-color:red;">Grupofactor</td>
                <td colspan="2">'.$row->d12.'</td>
            </tr>
            <tr>
                <td style="color:white; background-color:red;">C. Hb.C.M.</td>
                <td>'.$row->d13.'</td>
                <td>%</td>
                <td>32-36%</td>
                <td style="color:white; background-color:red;">Reticulocitos</td>
                <td>'.$row->d14.'</td>
                <td>0.5-2%</td>
            </tr>
            <tr>
                <td style="color:white; background-color:red;">Globulos Blancos</td>
                <td>'.$row->d15.'</td>
                <td>10 <sup>9</sup>/L</td>
                <td> 4.5-10.5x10 <sup>9</sup>/L</td>
                <td style="color:white; background-color:red;">IPR</td>
                <td>'.$row->d16.'</td>
                <td></td>
            </tr>
            <tr>
                <td style="color:white; background-color:red;">Plaquetas</td>
                <td>'.$row->d17.'</td>
                <td>x10 <sup>9 </sup>/L</td>
                <td>105-400x10 <sup>9</sup> /L</td>
                <td colspan="3"></td>
            </tr>
        </table>
        <table border="1" style="width: 100%;color: black">
            <tr>
                <td colspan="5"></td>
                <td colspan="2">VALOR REFERENCIAL</td>
            </tr>
            <tr>
                <td style="color:white; background-color:red;"></td>
                <td colspan="2">RELATIVA</td>
                <td colspan="2">ABSOLUTA</td>
                <td>RELATIVA</td>
                <td>ABSOLUTA</td>
            </tr>
            <tr>
                <td style="color:white; background-color:red;">Cayados</td>
                <td>'.$row->d18.'</td>
                <td>%</td>
                <td>'.$row->d19.'</td>
                <td>x10 <sup>9</sup>/L</td>
                <td>0-3%</td>
                <td>0.00-0.35x10 <sup>9</sup>/L</td>
            </tr>
            <tr>
                <td style="color:white; background-color:red;">Neutrofilos</td>
                <td>'.$row->d20.'</td>
                <td>%</td>
                <td>'.$row->d21.'</td>
                <td>x10 <sup>9</sup>/L</td>
                <td>50-70%</td>
                <td>2.50-7.35x10 <sup>9</sup>/L</td>
            </tr>
            <tr>
                <td style="color:white; background-color:red;">Eosinofilos</td>
                <td>'.$row->d22.'</td>
                <td>%</td>
                <td>'.$row->d23.'</td>
                <td>x10 <sup>9</sup>/L</td>
                <td>0-3%</td>
                <td>0.00-0.35x10 <sup>9</sup>/L</td>
            </tr>
            <tr>
                <td style="color:white; background-color:red;">Basofilos</td>
                <td>'.$row->d24.'</td>
                <td>%</td>
                <td>'.$row->d25.'</td>
                <td>x10 <sup>9</sup>/L</td>
                <td>0-1%</td>
                <td>0.00-0.15x10 <sup>9</sup>/L</td>
            </tr>
            <tr>
                <td style="color:white; background-color:red;">Linfocitos</td>
                <td>'.$row->d26.'</td>
                <td>%</td>
                <td>'.$row->d27.'</td>
                <td>x10 <sup>9</sup>/L</td>
                <td>25-40%</td>
                <td>1.25-4.200x10 <sup>9</sup>/L</td>
            </tr>
            <tr>
                <td style="color:white; background-color:red;">Monocitos</td>
                <td>'.$row->d28.'</td>
                <td>%</td>
                <td>'.$row->d29.'</td>
                <td>x10 <sup>9</sup>/L</td>
                <td>4-8%</td>
                <td>2.00-8.40x10 <sup>9</sup>/L</td>
            </tr>
            <tr>
                <td style="color:white; background-color:red;">BLASTOS</td>
                <td>'.$row->d30.'</td>
                <td>%</td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
            </tr>
        </table>
        <table border="1" style="width: 100%;color: black">
            <tr>
                <td colspan="2">MORFOLOGIA DE FRONTIS DE SANGRE PERIFERICA</td>
            </tr>
            <tr>
                <td style="color:white; background-color:red;">Serie Rojas:</td>
                <td>'.$row->d31.'</td>
            </tr>
            <tr>
                <td style="color:white; background-color:red;">Serie Blancas:</td>
                <td>'.$row->d32.'</td>
            </tr>
            <tr>
                <td style="color:white; background-color:red;">Serie Plaquetarias:</td>
                <td>'.$row->d33.'</td>
            </tr>
            <tr>
                <td style="color:white; background-color:red;">FECHA DE TOMA DE MUESTRA:</td>
                <td>'.$row->fechatoma.'</td>
            </tr>
            <tr>
                <td style="color:white; background-color:red;">Responsable:</td>
                <td>'.$row->user->name.'</td>
            </tr>
        </table>';
        return $cadena;
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Hemograma  $hemograma
     * @return \Illuminate\Http\Response
     */
    public function show(Hemograma $hemograma)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Hemograma  $hemograma
     * @return \Illuminate\Http\Response
     */
    public function edit(Hemograma $hemograma)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Hemograma  $hemograma
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Hemograma $hemograma)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Hemograma  $hemograma
     * @return \Illuminate\Http\Response
     */
    public function destroy(Hemograma $hemograma)
    {
        //
    }
}
