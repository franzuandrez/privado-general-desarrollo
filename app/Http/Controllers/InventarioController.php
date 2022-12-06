<?php

namespace App\Http\Controllers;

use App\Http\Requests\InventarioEgresoStoreRequest;
use App\Http\Requests\InventarioStoreRequest;
use App\Inventario;
use App\Medicamento;
use App\MedicamentoPresentacion;
use App\VWInventario;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class InventarioController extends Controller
{
    public function index()
    {
        $collection = VWInventario::all();

        $data = ['collection' => $collection];

        return view('farmacia.inventario.index', $data);
    }

    public function create()
    {
        $medicamentos = Medicamento::active()->get();
        return view('farmacia.inventario.create', compact('medicamentos'));
    }

    public function store(InventarioStoreRequest $request)
    {
        try {
            $inventario = new Inventario();
            $inventario->id_tipo_movimiento = $request->tipo_movimiento;
            $inventario->id_medicamento = $request->medicamento;
            $inventario->id_presentacion = $request->presentacion;
            $inventario->id_usuario_grabo = current_user();
            $inventario->total = $request->total;
            $inventario->fecha_ingreso = Carbon::now();
            $inventario->fecha_vencimiento = $request->fecha_vencimiento;
            $inventario->lote = $request->lote;
            $inventario->observaciones = $request->observaciones;
            $inventario->save();

            return redirect()->route('inventario.index')->with('store', 'Registro agregado');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Ha ocurrido un error por favor inténtelo nuevamente');
        }
    }

    public function reduce()
    {
        $medicamentos = Medicamento::active()->get();
        return view('farmacia.inventario.reduce', compact('medicamentos'));
    }

    public function restar(InventarioEgresoStoreRequest $request)
    {
        try {
            $datosInventario = Inventario::where('id_medicamento', $request->medicamento)->where('id_presentacion', $request->presentacion)->where('lote', $request->lote)->first();

            $inventario = new Inventario();
            $inventario->id_tipo_movimiento = $request->tipo_movimiento;
            $inventario->id_medicamento = $request->medicamento;
            $inventario->id_presentacion = $request->presentacion;
            $inventario->id_usuario_grabo = current_user();
            $inventario->total = $request->total;
            $inventario->fecha_ingreso = $datosInventario->fecha_ingreso;
            $inventario->fecha_vencimiento = $datosInventario->fecha_vencimiento;
            $inventario->lote = $request->lote;
            $inventario->observaciones = $request->observaciones;
            $inventario->save();

            return redirect()->route('inventario.index')->with('store', 'Registro agregado');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Ha ocurrido un error por favor inténtelo nuevamente');
        }
    }

    function getPresentaciones(Request $request)
    {
        if (!$request->ajax()) {
            return null;
        }
        try {
            $medicamentoPresentacion = MedicamentoPresentacion::queryPresentaciones()->where('medicamento_presentacion.id_medicamento', $request->id_medicamento)->get();
            return response()->json(['data' => $medicamentoPresentacion, 'status' => '200']);
        } catch (\Exception $e) {
            return response()->json(['data' => null, 'status' => '500', 'error' => $e->getMessage()]);
        }
    }

    function getLotes(Request $request)
    {
        if (!$request->ajax()) {
            return null;
        }
        try {
            $lotes = Inventario::where('id_medicamento', $request->id_medicamento)
                ->where('id_presentacion', $request->id_presentacion)
                ->groupBy('lote')
                ->get();

            return response()->json(['data' => $lotes, 'status' => '200']);
        } catch (\Exception $e) {
            return response()->json(['data' => null, 'status' => '500', 'error' => $e->getMessage()]);
        }
    }
}
