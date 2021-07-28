<?php

namespace App\Http\Controllers;

use App\Models\vaginal;
use Illuminate\Http\Request;
use App\Models\Doctor;
use Illuminate\Support\Facades\Auth;
class VaginalController extends Controller
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
        vaginal::create($input);
        return redirect('/pacientes');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\vaginal  $vaginal
     * @return \Illuminate\Http\Response
     */
    public function show(vaginal $vaginal)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\vaginal  $vaginal
     * @return \Illuminate\Http\Response
     */
    public function edit(vaginal $vaginal)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\vaginal  $vaginal
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, vaginal $vaginal)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\vaginal  $vaginal
     * @return \Illuminate\Http\Response
     */
    public function destroy(vaginal $vaginal)
    {
        //
    }
}
