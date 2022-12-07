<?php

namespace App\Http\Controllers;

use App\Doctor;
use Illuminate\Http\Request;

class DoctorController extends Controller
{
    public function index()
    {
        $collection = Doctor::all();

        $data = ['collection' => $collection];

        return view('registro.personal.index', $data);
    }

    public function create()
    {
        return view('registro.personal.create');
    }

    public function store(Request $request)
    {

        try {
            $paciente = Doctor::create($request->all());
            return redirect()->back();
        } catch (\Exception $e) {
            dd($e);
        }
    }
}
