<?php

namespace App\Http\Controllers;

use App\Models\Reactivo;
use App\Models\Inventario;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ReactivoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $reactivos=Reactivo::with('inventarios')->get();
        return view('reactivo',['reactivos'=>$reactivos]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $reactivo=Reactivo::create($request->all()+ ['user_id' => Auth::user()->id]);
        return  redirect('reactivo');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Reactivo  $reactivo
     * @return \Illuminate\Http\Response
     */
    public function show(Reactivo $reactivo)
    {
        if ($reactivo->estado=='ACTIVO'){
            $reactivo->estado='INACTIVO';
        }else{
            $reactivo->estado='ACTIVO';
        }
        $reactivo->save();
        return  redirect('reactivo');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Reactivo  $reactivo
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Reactivo $reactivo)
    {
        $reactivo->update($request->all());
        return  redirect('reactivo');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Reactivo  $reactivo
     * @return \Illuminate\Http\Response
     */
    public function destroy(Reactivo $reactivo)
    {
        $reactivo->delete();
        return  redirect('reactivo');
    }
    public function caduca(){
        $reactivos=Inventario::where('estado','ACTIVO')->whereDate('fechavencimiento','>=',now())->get();
        return view('caduca',['reactivos'=>$reactivos]);
    }
}
