<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});
Route::get('/historial', function () {
    return view('historia');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home')->middleware('auth');
Route::get('/ver', [App\Http\Controllers\HomeController::class, 'ver'])->middleware('auth');
Route::get('/doctor', [App\Http\Controllers\HomeController::class, 'doctor'])->middleware('auth');
Route::get('/pacientes', [App\Http\Controllers\HomeController::class, 'paciente'])->middleware('auth');
Route::get('/buscar', [App\Http\Controllers\HomeController::class, 'buscar'])->middleware('auth');
Route::get('/reportes', [App\Http\Controllers\HomeController::class, 'reportes'])->middleware('auth');

Route::apiResource('/user', App\Http\Controllers\UserController::class)->middleware('auth');
Route::post('/estado/{user}', [App\Http\Controllers\UserController::class, 'estado'])->middleware('auth');
Route::apiResource('/paciente',\App\Http\Controllers\PacienteController::class)->middleware('auth');
Route::apiResource('/hemograma',\App\Http\Controllers\HemogramaController::class)->middleware('auth');
Route::apiResource('/orina',\App\Http\Controllers\OrinaController::class)->middleware('auth');
Route::apiResource('/sanguinia',\App\Http\Controllers\SanguiniaController::class)->middleware('auth');
Route::apiResource('/reactivo',\App\Http\Controllers\ReactivoController::class)->middleware('auth');
Route::get('/caduca',[\App\Http\Controllers\ReactivoController::class,'caduca'])->middleware('auth');
