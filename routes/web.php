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

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home')->middleware('auth');
Route::get('/doctor', [App\Http\Controllers\HomeController::class, 'doctor'])->middleware('auth');
Route::get('/paciente', [App\Http\Controllers\HomeController::class, 'paciente'])->middleware('auth');
Route::get('/buscar', [App\Http\Controllers\HomeController::class, 'buscar'])->middleware('auth');
Route::get('/reportes', [App\Http\Controllers\HomeController::class, 'reportes'])->middleware('auth');

Route::apiResource('/user', App\Http\Controllers\UserController::class)->middleware('auth');
Route::get('/estado/{user}', [App\Http\Controllers\UserController::class, 'pass'])->middleware('auth');
