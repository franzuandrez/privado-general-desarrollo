<?php

namespace App\Http\Controllers;

use App\Cita;
use App\Medicamento;
use App\Paciente;
use App\RecetaDet;
use App\RecetaEnc;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DiagnosticoController extends Controller
{
    public function create($id_cita)
    {
        $cita = Cita::find($id_cita);
        if($cita->atendido == true){
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
        try {
            DB::beginTransaction();
            $recetaMedica = json_decode($request->get('receta'));

            $recetaEnc = new RecetaEnc();
            $recetaEnc->id_cita = $request->get('id_cita');
            $recetaEnc->id_doctor = current_user();
            $recetaEnc->fecha = Carbon::now();
            $recetaEnc->diagnostico = $request->get('diagnostico');
            $recetaEnc->save();

            foreach ($recetaMedica as $key => $item) {
                $recetaDet = new RecetaDet();
                $recetaDet->id_receta_enc = $recetaEnc->id;
                $recetaDet->id_medicamento = $item->id_medicamento;
                $recetaDet->id_presentacion = $item->id_presentacion;
                $recetaDet->indicacion = $item->indicaciones;
                $recetaDet->save();
            }

            DB::commit();
            return response()->json(['data' => null, 'status' => 200, 'message' => 'Diagnóstico completado']);
        } catch (\Exception $e) {
            DB::rollBack();
            return response()->json(['data' => null, 'status' => 500, 'message' => 'Ha ocurrido un error por favor inténtelo nuevamente']);
        }
    }

}
