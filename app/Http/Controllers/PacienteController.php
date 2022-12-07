<?php

namespace App\Http\Controllers;

use App\Cita;
use App\Http\Requests\PacienteStoreRequest;
use App\Paciente;
use App\RecetaEnc;
use Illuminate\Http\Request;

class PacienteController extends Controller
{
    public function index()
    {
        $collection = Paciente::where('estado', 1)->get();

        $data = ['collection' => $collection];

        return view('registro.paciente.index', $data);
    }

    public function create()
    {
        return view('registro.paciente.create');
    }

    public function store(PacienteStoreRequest $request)
    {
        try {
            $nombres = $request->get('primer_nombre') . ' ' . $request->get('segundo_nombre');
            $apellidos = $request->get('primer_apellido') . ' ' . $request->get('segundo_apellido');

            $paciente = Paciente::create($request->all());
            $pacienteNew = Paciente::find($paciente->id);
            $pacienteNew->nombres = $nombres;
            $pacienteNew->apellidos = $apellidos;
            $pacienteNew->save();

            return redirect()->route('paciente.index')->with('store', 'Registro agregado');
        } catch (Exception $e) {
            return redirect()->back()->with('error', 'Ha ocurrido un error por favor inténtelo nuevamente');
        }
    }

    public function edit($id)
    {
        try {
            $paciente = Paciente::findOrFail($id);

            return view('registro.paciente.edit', compact('paciente'));
        } catch (\Exception $e) {
            abort(404);
        }
    }

    public function update(PacienteStoreRequest $request, $id)
    {
        try {
            $paciente = Paciente::findOrFail($id);
            $paciente->nombres = $request->nombres;
            $paciente->apellidos = $request->apellidos;
            $paciente->fecha_nacimiento = $request->fecha_nacimiento;
            $paciente->update();

            return redirect()->route('paciente.index')->with('update', 'Registro actualizado');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Ha ocurrido un error por favor inténtelo nuevamente');
        }
    }

    function destroy($id)
    {
        try {
            $personal = Paciente::findOrFail($id);
            $personal->estado = 0;
            $personal->update();

            return redirect()->route('paciente.index')->with('delete', 'Registro dado de baja');
        } catch (\Exception $ex) {
            return redirect()->back()->with('error', 'Ha ocurrido un error por favor inténtelo nuevamente');
        }
    }


    public function historial($id)
    {
        $paciente = Paciente::findOrFail($id);

        $citas = Cita::select('cita.*', 'receta_enc.diagnostico', 'receta_enc.fecha', 'receta_enc.id_cita')
            ->leftJoin('receta_enc', 'receta_enc.id_cita', '=', 'cita.id')
            ->where('cita.id_paciente', $id)
            ->get();


        return view('registro.paciente.historial', compact('paciente', 'citas'));
    }
}
