<?php

namespace App\Http\Controllers;

use App\Models\Doctor;
use App\Models\Orina;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OrinaController extends Controller
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

        if (Doctor::where('nombre',$request->requerido)->get()->count()==0 && $request->requerido!=''){
            Doctor::create(['nombre'=>$request->requerido]);
        }
        Orina::create($request->all()+ ['user_id' => Auth::user()->id]);
        return redirect('/pacientes');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Orina  $orina
     * @return \Illuminate\Http\Response
     */
    public function show(Orina $orina)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Orina  $orina
     * @return \Illuminate\Http\Response
     */
    public function edit(Orina $orina)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Orina  $orina
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Orina $orina)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Orina  $orina
     * @return \Illuminate\Http\Response
     */
    public function destroy(Orina $orina)
    {
        //
    }
}
