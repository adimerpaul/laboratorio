<?php

namespace App\Http\Controllers;

use App\Models\Paciente;
use App\Models\User;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }
    public function doctor()
    {
        $users=User::where('id','!=',1)->get();
        return view('doctor',['users'=>$users]);
    }
    public function paciente()
    {
        $pacientes=Paciente::all();
        return view('paciente',['pacientes'=>$pacientes]);
    }
    public function buscar()
    {
        return view('buscar');
    }
    public function reporte()
    {
        return view('reporte');
    }
}
