<?php

namespace App\Http\Controllers;

use App\Models\Uretral;
use Illuminate\Http\Request;
use App\Models\Doctor;
use Illuminate\Support\Facades\Auth;
class UretralController extends Controller
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
        //
        if (Doctor::where('nombre',$request->requerido)->get()->count()==0 && $request->requerido!=''){
            Doctor::create(['nombre'=>$request->requerido]);
        }
        $input=$request->all();
        $input['user_id']=Auth::user()->id;
        $input['fechatoma']=date('Y-m-d');
        uretral::create($input);
        return redirect('/pacientes');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Uretral  $uretral
     * @return \Illuminate\Http\Response
     */
    public function show(Uretral $uretral)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Uretral  $uretral
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Uretral $uretral)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Uretral  $uretral
     * @return \Illuminate\Http\Response
     */
    public function destroy(Uretral $uretral)
    {
        //
    }
}
