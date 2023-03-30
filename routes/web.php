<?php

use App\Http\Controllers\ConsultaController;
use App\Http\Controllers\HistoriaController;
use App\Http\Controllers\medicoController;
use App\Http\Controllers\pacienteController;
use App\Http\Controllers\roleController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Auth;
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
    return view('auth/login');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::resource('roles', roleController::class)->names('roles');
Route::resource('users', UserController::class)->names('users');
Route::resource('medicos', medicoController::class)->names('medicos');
Route::resource('pacientes', pacienteController::class)->names('pacientes');
Route::resource('consultas', ConsultaController::class)->names('consultas');
Route::get('consultas/diagnostico/{id}', [ConsultaController::class, 'diagnostico']);
Route::post('consultas/diag_store/{id}', [ConsultaController::class, 'diag_store']);
Route::resource('historias', HistoriaController::class)->names('historias');