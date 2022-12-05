<?php

namespace App\Http\Controllers;

use App\Http\Requests\PacienteStoreRequest;
use App\Paciente;
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
            $paciente = Paciente::create($request->all());
            return redirect()->route('paciente.index')->with('store', 'Registro agregado');
        } catch (Exception $e) {
            return redirect()->back()->with('error', 'Ups! Ha ocurrido un error inesperado, por favor inténtelo nuevamente');
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
            return redirect()->back()->with('error', 'Ups! Ha ocurrido un error inesperado, por favor inténtelo nuevamente');
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
            return redirect()->back()->with('error', 'Ups! Ha ocurrido un error inesperado, por favor inténtelo nuevamente');
        }
    }
}