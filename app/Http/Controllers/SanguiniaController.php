<?php

namespace App\Http\Controllers;

use App\Models\Hemograma;
use App\Models\sanguinia;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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
        $input=$request->all();
        $input['user_id']=Auth::user()->id;
        $input['fechatoma']=date('Y-m-d');
        sanguinia::create($input);
        return redirect('/pacientes');
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
