<?php

namespace App\Http\Controllers;

use App\Cita;
use App\Inventario;
use App\Medicamento;
use App\Paciente;
use App\RecetaDet;
use App\RecetaEnc;
use App\VentaDet;
use App\Ventas;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DiagnosticoController extends Controller
{
    public function create($id_cita)
    {
        $cita = Cita::find($id_cita);
        if ($cita->atendido == true) {
            return redirect()->route('cita.index')->with('error', 'El paciente ya fue atendido');
        }

        $cita->atendido = true;
        $cita->update();
        $paciente = Paciente::find($cita->id_paciente);
        $medicamentos = Medicamento::active()->get();
        return view('servicio.diagnostico.create', compact('medicamentos', 'id_cita', 'paciente'));
    }

    public function store(Request $request)
    {

        //dd($request->all());
        try {
            DB::beginTransaction();
            $recetaMedica = json_decode($request->get('receta'));

            $cita = Cita::find($request->get('id_cita'));

            $recetaEnc = new RecetaEnc();
            $recetaEnc->id_cita = $request->get('id_cita');
            $recetaEnc->id_doctor = current_user();
            $recetaEnc->fecha = Carbon::now();
            $recetaEnc->diagnostico = $request->get('diagnostico');
            $recetaEnc->save();
            if ($request->get('solo_receta') == 0) {

                $venta_enc = new Ventas();
                $venta_enc->fecha = Carbon::now();
                $venta_enc->id_receta = $recetaEnc->id;
                $venta_enc->id_paciente = $cita->id_paciente;
                $venta_enc->save();

            }
            foreach ($recetaMedica as $key => $item) {
                $recetaDet = new RecetaDet();
                $recetaDet->id_receta_enc = $recetaEnc->id;
                $recetaDet->id_medicamento = $item->id_medicamento;
                $recetaDet->id_presentacion = $item->id_presentacion;
                $recetaDet->indicacion = $item->indicaciones;
                $recetaDet->save();

                if ($request->get('solo_receta') == 0) {
                    $venta_det = new VentaDet();
                    $venta_det->id_enc = $venta_enc->id;
                    $venta_det->id_medicamento = $recetaDet->id_medicamento;
                    $venta_det->id_presentacion = $recetaDet->id_presentacion;
                    $venta_det->cantidad = $item->cantidad;
                    $venta_det->precio = $item->precio;
                    $venta_det->total = $item->total;
                    $venta_det->save();

                    $datosInventario = Inventario::where('id_medicamento', $venta_det->id_medicamento)
                        ->where('id_presentacion', $venta_det->id_presentacion)
                        ->orderBy('fecha_vencimiento', 'desc')
                        ->orderBy('fecha_ingreso', 'desc')
                        ->first();

                    $inventario = new Inventario();
                    $inventario->id_tipo_movimiento =2;
                    $inventario->id_medicamento =  $venta_det->id_medicamento;
                    $inventario->id_presentacion = $venta_det->id_presentacion;
                    $inventario->id_usuario_grabo = current_user();
                    $inventario->total = $venta_det->cantidad;
                    $inventario->fecha_ingreso = $datosInventario->fecha_ingreso;
                    $inventario->fecha_vencimiento = $datosInventario->fecha_vencimiento;
                    $inventario->lote = $datosInventario->lote;

                    $inventario->save();

                }


            }

            DB::commit();
            return response()->json(['data' => $recetaEnc->id_cita, 'status' => 200, 'message' => 'Diagnóstico completado']);
        } catch (\Exception $e) {
            DB::rollBack();
            return response()->json(['data' => $e->getMessage(), 'status' => 500, 'message' => 'Ha ocurrido un error por favor inténtelo nuevamente']);
        }
    }

}
