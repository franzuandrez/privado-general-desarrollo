<?php

namespace App\Http\Controllers;

use App\Cita;
use App\Http\Requests\CitaStoreRequest;
use App\Http\Requests\CitaUpdateRequest;
use App\Paciente;
use Carbon\Carbon;
use Illuminate\Http\Request;

class CitaController extends Controller
{
    public function index()
    {
        $collection = Cita::joinCita()->active()->where('cita.atendido', 0)->get();

        $data = ['collection' => $collection];

        return view('servicio.cita.index', $data);
    }

    public function create()
    {
        $pacientes = Paciente::active()->get();
        return view('servicio.cita.create', compact('pacientes'));
    }

    public function store(CitaStoreRequest $request)
    {
        try {
            $cita = new Cita();
            $cita->id_paciente = $request->paciente;
            $cita->motivo = $request->motivo;
            $cita->fecha_cita = $request->fecha_cita;
            $cita->fecha_genero = Carbon::now();
            $cita->save();

            return redirect()->route('cita.index')->with('store', 'Registro agregado');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Ups! Ha ocurrido un error inesperado, por favor inténtelo nuevamente');
        }
    }

    public function edit($id)
    {
        try {
            $cita = Cita::with('paciente')->findOrFail($id);

            return view('servicio.cita.edit', compact('cita'));
        } catch (\Exception $e) {
            abort(404);
        }
    }

    public function update(CitaUpdateRequest $request, $id)
    {
        try {
            $cita = Cita::findOrFail($id);
            $cita->motivo = $request->motivo;
            $cita->fecha_cita = $request->fecha_cita;
            $cita->update();

            return redirect()->route('cita.index')->with('update', 'Registro actualizado');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Ups! Ha ocurrido un error inesperado, por favor inténtelo nuevamente');
        }
    }

    function destroy($id)
    {
        try {
            $cita = Cita::findOrFail($id);
            $cita->estado = 0;
            $cita->update();

            return redirect()->route('cita.index')->with('delete', 'Registro dado de baja');
        } catch (\Exception $ex) {
            return redirect()->back()->with('error', 'Ups! Ha ocurrido un error inesperado, por favor inténtelo nuevamente');
        }
    }
}
