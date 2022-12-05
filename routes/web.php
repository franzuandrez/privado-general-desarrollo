<?php

use App\Http\Controllers\CitaController;
use App\Http\Controllers\PacienteController;
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
    return view('layout.app');
});

Route::get('paciente', [PacienteController::class, 'index'])->name('paciente.index');
Route::get('paciente/create', [PacienteController::class, 'create'])->name('paciente.create');
Route::post('paciente/store', [PacienteController::class, 'store'])->name('paciente.store');
Route::get('paciente/edit/{id}', [PacienteController::class, 'edit'])->name('paciente.edit');
Route::patch('paciente/update/{id}', [PacienteController::class, 'update'])->name('paciente.update');
Route::delete('paciente/delete/{id}', [PacienteController::class, 'destroy'])->name('paciente.destroy');

Route::get('cita', [CitaController::class, 'index'])->name('cita.index');
Route::get('cita/create', [CitaController::class, 'create'])->name('cita.create');
Route::post('cita/store', [CitaController::class, 'store'])->name('cita.store');
Route::get('cita/edit/{id}', [CitaController::class, 'edit'])->name('cita.edit');
Route::patch('cita/update/{id}', [CitaController::class, 'update'])->name('cita.update');
Route::delete('cita/delete/{id}', [CitaController::class, 'destroy'])->name('cita.destroy');


Route::get('diagnostico/{id}', [DiagnosticoController::class, 'create'])->name('diagnostico.create');
Route::post('diagnostico/store', [DiagnosticoController::class, 'store'])->name('diagnostico.store');
