<?php

namespace App\Http\Controllers;

use App\Http\Requests\PresentacionStoreRequest;
use App\Presentacion;
use Illuminate\Http\Request;

class PresentacionController extends Controller
{
    public function index()
    {
        $collection = Presentacion::active()->get();
        $data = ['collection' => $collection];

        return view('registro.presentacion.index', $data);
    }

    public function create()
    {
        return view('registro.presentacion.create');
    }

    public function store(PresentacionStoreRequest $request)
    {
        try {
            $presentacion = Presentacion::create($request->all());
            return redirect()->route('presentacion.index')->with('store', 'Registro agregado');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Ups! Ha ocurrido un error inesperado, por favor inténtelo nuevamente');
        }
    }

    public function edit($id)
    {
        try {
            $presentacion = Presentacion::findOrFail($id);
            return view('registro.presentacion.edit', compact('presentacion'));
        } catch (\Exception $e) {
            abort(404);
        }
    }

    public function update(PresentacionStoreRequest $request, $id)
    {
        try {
            $presentacion = Presentacion::findOrFail($id);
            $presentacion->presentacion = $request->presentacion;
            $presentacion->update();

            return redirect()->route('presentacion.index')->with('update', 'Registro actualizado');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Ups! Ha ocurrido un error inesperado, por favor inténtelo nuevamente');
        }
    }

    function destroy($id)
    {
        try {
            $presentacion = Presentacion::findOrFail($id);
            $presentacion->estado = 0;
            $presentacion->update();

            return redirect()->route('presentacion.index')->with('delete', 'Registro dado de baja');
        } catch (\Exception $ex) {
            return redirect()->back()->with('error', 'Ups! Ha ocurrido un error inesperado, por favor inténtelo nuevamente');
        }
    }
}
