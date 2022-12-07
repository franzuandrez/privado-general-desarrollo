<?php

namespace App\Http\Controllers;

use App\Cita;
use App\RecetaEnc;
use App\Ventas;
use Illuminate\Http\Request;

class VentasController extends Controller
{
    //


    public function index(Request $request)
    {

        $collection = Ventas::select('ventas_enc.*', 'paciente.nombres', 'paciente.apellidos')
            ->join('paciente', 'paciente.id', 'ventas_enc.id_paciente')
            ->get();


        return view('servicio.ventas.index', compact('collection'));
    }


    public function create()
    {

        $recetas = RecetaEnc::select('receta_enc.*', 'paciente.nombres', 'paciente.apellidos')
            ->join('cita', 'cita.id', '=', 'receta_enc.id_cita')
            ->join('paciente', 'paciente.id', '=', 'cita.id_paciente')
            ->where('receta_enc.atendido', '1')->get();


        return view('servicio.ventas.create', compact('recetas'));
    }

    public function show($id)
    {

    }
}
