<?php

namespace App\Http\Controllers;

use App\Models\Hemograma;
use App\Models\Orina;
use App\Models\sanguinia;
use Illuminate\Http\Request;

class HistorialController extends Controller
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
        if ($request->reporte==1){
            $array=[
                ["name"=>"Grupo sanguineo","y"=>Hemograma::where('d1','!=',NULL)->whereDate('created_at','<=',$request->fechafin)->whereDate('created_at','>=',$request->fechainicio)->get()->count()],
                ["name"=>"Reticulocitos","y"=>Hemograma::where('d14','!=',NULL)->whereDate('created_at','<=',$request->fechafin)->whereDate('created_at','>=',$request->fechainicio)->get()->count()]
            ];
        }else if ($request->reporte==3){
            $array=[
                ["name"=>"Acido urinico","y"=>sanguinia::where('d9','!=',NULL)->whereDate('created_at','<=',$request->fechafin)->whereDate('created_at','>=',$request->fechainicio)->get()->count()],
                ["name"=>"Albumina","y"=>sanguinia::where('d12','!=',NULL)->whereDate('created_at','<=',$request->fechafin)->whereDate('created_at','>=',$request->fechainicio)->get()->count()],
                ["name"=>"Amilasa","y"=>sanguinia::where('d16','!=',NULL)->whereDate('created_at','<=',$request->fechafin)->whereDate('created_at','>=',$request->fechainicio)->get()->count()],
                ["name"=>"Bilirrubina","y"=>sanguinia::where('d19','!=',NULL)->whereDate('created_at','<=',$request->fechafin)->whereDate('created_at','>=',$request->fechainicio)->get()->count()],
                ["name"=>"Colesterol","y"=>sanguinia::where('d13','!=',NULL)->whereDate('created_at','<=',$request->fechafin)->whereDate('created_at','>=',$request->fechainicio)->get()->count()],
            ];
        }else if ($request->reporte==4){
            $array=[
                ["name"=>"Orinas","y"=>Orina::where('d1','!=',NULL)->whereDate('created_at','<=',$request->fechafin)->whereDate('created_at','>=',$request->fechainicio)->get()->count()],
            ];
        }
        return response()->json($array);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return $id;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
