<?php

namespace App\Http\Controllers;

use App\Http\Requests\DoctorStoreRequest;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Models\Role;

class MedicoController extends Controller
{
    function index()
    {
        $collection = User::role('Doctor')->where('estado', 1)->get();
        return view('registro.medico.index', compact('collection'));
    }

    public function create()
    {
        return view('registro.medico.create');
    }

    public function store(DoctorStoreRequest $request)
    {
        try {
            DB::beginTransaction();

            $user = new User();
            $user->name = $request->username;
            $user->email = $request->email;
            $user->password = bcrypt($request->password);
            $user->nombres = $request->nombres;
            $user->apellidos = $request->apellidos;
            $user->save();

            $user->assignRole('Doctor');
            DB::commit();
            return redirect()->route('medico.index')->with('store', 'Registro agregado');
        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->back()->with('error', 'Ha ocurrido un error por favor inténtelo nuevamente');
        }
    }

    function destroy($id)
    {
        try {
            $personal = User::findOrFail($id);
            $personal->estado = 0;
            $personal->update();

            return redirect()->route('medico.index')->with('delete', 'Registro dado de baja');
        } catch (\Exception $ex) {
            return redirect()->back()->with('error', 'Ha ocurrido un error por favor inténtelo nuevamente');
        }
    }
}
