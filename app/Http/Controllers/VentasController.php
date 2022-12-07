<?php

namespace App\Http\Controllers;

use App\Cita;
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

    public function show($id)
    {

    }
}
