<?php

namespace App\Http\Controllers;

use App\Models\Doctor;
use App\Models\seriado;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

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
        seriado::create($input);
        return redirect('/pacientes');
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
