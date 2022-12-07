<?php

use App\Http\Controllers\CitaController;
use App\Http\Controllers\DiagnosticoController;
use App\Http\Controllers\MedicamentoController;
use App\Http\Controllers\MedicoController;
use App\Http\Controllers\InventarioController;
use App\Http\Controllers\PacienteController;
use App\Http\Controllers\PDFController;
use App\Http\Controllers\PersonalController;
use App\Http\Controllers\PresentacionController;
use App\Http\Controllers\RolController;
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

Auth::routes();

Route::group(['namespace' => 'Dashboard', 'middleware' => ['auth']], function () {
    Route::get('/', function () {
        return view('layout.app');
    });

    Route::get('paciente', [PacienteController::class, 'index'])->name('paciente.index');
    Route::get('paciente/create', [PacienteController::class, 'create'])->name('paciente.create');
    Route::post('paciente/store', [PacienteController::class, 'store'])->name('paciente.store');
    Route::get('paciente/historial/{id}', [PacienteController::class, 'historial'])->name('paciente.historial');
    Route::get('paciente/edit/{id}', [PacienteController::class, 'edit'])->name('paciente.edit');
    Route::patch('paciente/update/{id}', [PacienteController::class, 'update'])->name('paciente.update');
    Route::delete('paciente/delete/{id}', [PacienteController::class, 'destroy'])->name('paciente.destroy');


    Route::get('receta/{id_cita}', [PDFController::class, 'pdf_receta'])->name('pdf.receta');


    Route::get('cita', [CitaController::class, 'index'])->name('cita.index');
    Route::get('cita/create', [CitaController::class, 'create'])->name('cita.create');
    Route::post('cita/store', [CitaController::class, 'store'])->name('cita.store');
    Route::get('cita/edit/{id}', [CitaController::class, 'edit'])->name('cita.edit');
    Route::patch('cita/update/{id}', [CitaController::class, 'update'])->name('cita.update');
    Route::delete('cita/delete/{id}', [CitaController::class, 'destroy'])->name('cita.destroy');


    Route::get('diagnostico/{id}', [DiagnosticoController::class, 'create'])->name('diagnostico.create');
    Route::post('diagnostico/store', [DiagnosticoController::class, 'store'])->name('diagnostico.store');

    Route::get('inventario', [InventarioController::class, 'index'])->name('inventario.index');
    Route::get('inventario/create', [InventarioController::class, 'create'])->name('inventario.create');
    Route::post('inventario/store', [InventarioController::class, 'store'])->name('inventario.store');
    Route::get('inventario/reduce', [InventarioController::class, 'reduce'])->name('inventario.reduce');
    Route::post('inventario/reduce', [InventarioController::class, 'restar'])->name('inventario.restar');


    Route::get('ajax/inventario/presentaciones', [InventarioController::class, 'getPresentaciones'])->name('inventario.getPresentaciones');
    Route::get('ajax/inventario/lotes', [InventarioController::class, 'getLotes'])->name('inventario.getLotes');

    Route::get('medico', [MedicoController::class, 'index'])->name('medico.index');
    Route::get('medico/create', [MedicoController::class, 'create'])->name('medico.create');
    Route::post('medico/store', [MedicoController::class, 'store'])->name('medico.store');
//Route::get('medico/edit/{id}', [MedicoController::class, 'edit'])->name('medico.edit');
//Route::patch('medico/update/{id}', [MedicoController::class, 'update'])->name('medico.update');
    Route::delete('medico/delete/{id}', [MedicoController::class, 'destroy'])->name('medico.destroy');



    Route::get('medicamento', [MedicamentoController::class, 'index'])->name('medicamento.index');
    Route::get('medicamento/create', [MedicamentoController::class, 'create'])->name('medicamento.create');
    Route::post('medicamento/store', [MedicamentoController::class, 'store'])->name('medicamento.store');
    Route::get('medicamento/edit/{id}', [MedicamentoController::class, 'edit'])->name('medicamento.edit');
    Route::patch('medicamento/update/{id}', [MedicamentoController::class, 'update'])->name('medicamento.update');
    Route::delete('medicamento/delete/{id}', [MedicamentoController::class, 'destroy'])->name('medicamento.destroy');


    Route::get('presentacion', [PresentacionController::class, 'index'])->name('presentacion.index');
    Route::get('presentacion/create', [PresentacionController::class, 'create'])->name('presentacion.create');
    Route::post('presentacion/store', [PresentacionController::class, 'store'])->name('presentacion.store');
    Route::get('presentacion/edit/{id}', [PresentacionController::class, 'edit'])->name('presentacion.edit');
    Route::patch('presentacion/update/{id}', [PresentacionController::class, 'update'])->name('presentacion.update');
    Route::delete('presentacion/delete/{id}', [PresentacionController::class, 'destroy'])->name('presentacion.destroy');


    Route::get('personal', [PersonalController::class, 'index'])->name('personal.index');
    Route::get('personal/create', [PersonalController::class, 'create'])->name('personal.create');
    Route::post('personal/store', [PersonalController::class, 'store'])->name('personal.store');
    Route::get('personal/edit/{id}', [PersonalController::class, 'edit'])->name('personal.edit');
    Route::patch('personal/update/{id}', [PersonalController::class, 'update'])->name('personal.update');
    Route::delete('personal/delete/{id}', [PersonalController::class, 'destroy'])->name('personal.destroy');


    Route::get('tipo_personal', [RolController::class, 'index'])->name('tipo_personal.index');
    Route::get('tipo_personal/create', [RolController::class, 'create'])->name('tipo_personal.create');
    Route::post('tipo_personal/store', [RolController::class, 'store'])->name('tipo_personal.store');
    Route::get('tipo_personal/edit/{id}', [RolController::class, 'edit'])->name('tipo_personal.edit');
    Route::patch('tipo_personal/update/{id}', [RolController::class, 'update'])->name('tipo_personal.update');
    Route::delete('tipo_personal/delete/{id}', [RolController::class, 'destroy'])->name('tipo_personal.destroy');


    Route::get('ventas', [\App\Http\Controllers\VentasController::class, 'index'])->name('ventas.index');
    Route::get('ventas/create', [\App\Http\Controllers\VentasController::class, 'create'])->name('ventas.create');
    Route::post('ventas/create', [\App\Http\Controllers\VentasController::class, 'store'])->name('ventas.store');
    Route::get('ventas/show/{id}', [\App\Http\Controllers\VentasController::class, 'show'])->name('ventas.show');

});





//
//Route::get('/home', 'HomeController@index')->name('home');
