<?php

namespace App\Http\Controllers;

use App\Http\Requests\MedicamentoStoreRequest;
use App\Medicamento;
use App\MedicamentoPresentacion;
use App\Presentacion;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class MedicamentoController extends Controller
{
    public function index()
    {
        $collection = Medicamento::select('medicamento.*', 'presentacion.presentacion')
            ->join('medicamento_presentacion', 'medicamento_presentacion.id_medicamento', '=', 'medicamento.id')
            ->join('presentacion', 'presentacion.id', '=', 'medicamento_presentacion.id_presentacion')
            ->active()
            ->get();
        $data = ['collection' => $collection];

        return view('registro.medicamento.index', $data);
    }

    public function create()
    {
        $presentaciones = Presentacion::active()->get();
        return view('registro.medicamento.create', compact('presentaciones'));
    }

    public function store(MedicamentoStoreRequest $request)
    {


        try {
            DB::beginTransaction();
            $medicamento = Medicamento::create($request->all());

            foreach ($request->presentaciones as $index => $item) {
                $presentacion = new MedicamentoPresentacion();
                $presentacion->id_medicamento = $medicamento->id;
                $presentacion->id_presentacion = $item;
                $presentacion->precio = $request->precio;
                $presentacion->save();
            }

            DB::commit();
            return redirect()->route('medicamento.index')->with('store', 'Registro agregado');
        } catch (\Exception $e) {
            DB::rollBack();
            dd($e);
            return redirect()->back()->with('error', 'Ups! Ha ocurrido un error inesperado, por favor inténtelo nuevamente');
        }
    }

    public function edit($id)
    {
        try {
            $medicamento = Medicamento::findOrFail($id);
            $medicamentoPresentacion = MedicamentoPresentacion::where('id_medicamento', $medicamento->id)->first();
            $presentaciones = Presentacion::active()->get();


            return view('registro.medicamento.edit', compact('medicamento', 'presentaciones', 'medicamentoPresentacion'));
        } catch (\Exception $e) {
            abort(404);
        }
    }

    public function update(MedicamentoStoreRequest $request, $id)
    {
        try {
            DB::beginTransaction();

            $medicamento = Medicamento::findOrFail($id);
            $medicamento->nombre = $request->nombre;
            $medicamento->descripcion = $request->descripcion;
            $medicamento->update();

            $medicamentoPresentacion = MedicamentoPresentacion::where('id_medicamento', $medicamento->id)->delete();

            foreach ($request->presentaciones as $index => $item) {
                $presentacion = new MedicamentoPresentacion();
                $presentacion->id_medicamento = $medicamento->id;
                $presentacion->id_presentacion = $item;
                $presentacion->save();
            }

            DB::commit();
            return redirect()->route('medicamento.index')->with('update', 'Registro actualizado');
        } catch (\Exception $e) {
            dd($e);
            DB::rollBack();
            return redirect()->back()->with('error', 'Ups! Ha ocurrido un error inesperado, por favor inténtelo nuevamente');
        }
    }

    function destroy($id)
    {
        try {
            $medicamento = Medicamento::findOrFail($id);
            $medicamento->estado = 0;
            $medicamento->update();

            return redirect()->route('medicamento.index')->with('delete', 'Registro dado de baja');
        } catch (\Exception $ex) {
            return redirect()->back()->with('error', 'Ups! Ha ocurrido un error inesperado, por favor inténtelo nuevamente');
        }
    }
}
