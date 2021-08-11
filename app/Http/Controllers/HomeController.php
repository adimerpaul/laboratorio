<?php

namespace App\Http\Controllers;

use App\Models\Doctor;
use App\Models\Paciente;
use App\Models\User;
use Barryvdh\DomPDF\Facade as PDF;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;

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

    public function paciente()
    {
        $doctors=Doctor::all();
        $pacientes=Paciente::all();
        return view('paciente',['pacientes'=>$pacientes,'doctors'=>$doctors]);
    }
    public function buscar()
    {
        return view('buscar');
    }
    public function reporte()
    {
        return view('reporte');
    }
    public function ver()
    {
        $pdf = App::make('dompdf.wrapper');
//        $pdf->loadHTML('<h1>Test</h1>');
//        return $pdf->stream();
//        $pdf = PDF::loadView('pdf.invoice', $data);
        $pdf = PDF::loadView('ver');
        return $pdf->stream();
//        return $pdf->download('invoice.pdf');
    }
}
