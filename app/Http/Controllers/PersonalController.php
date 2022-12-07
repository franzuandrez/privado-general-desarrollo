<?php

namespace App\Http\Controllers;

use App\Http\Requests\PersonalStoreRequest;
use App\Http\Requests\PersonalUpdateRequest;
use App\User;

use Illuminate\Support\Facades\DB;
use Spatie\Permission\Models\Role;

class PersonalController extends Controller
{
    public function index()
    {
        $collection = User::where('estado', 1)->get();

        return view('registro.personal.index', compact('collection'));
    }

    public function create()
    {
        $tipos = Role::where('status', 1)->get();
        return view('registro.personal.create', compact('tipos'));
    }

    public function store(PersonalStoreRequest $request)
    {
        try {
            DB::beginTransaction();

            $user = new User();
            $user->name = $request->nickname;
            $user->email = $request->email;
            $user->password = bcrypt($request->contrasenia);
            $user->nombres = $request->nombres;
            $user->apellidos = $request->apellidos;
            $user->save();

            $user->assignRole($request->input('tipo'));
            DB::commit();
            return redirect()->route('personal.index')->with('store', 'Registro agregado');
        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->back()->with('error', 'Ups! Ha ocurrido un error inesperado, por favor inténtelo nuevamente');
        }
    }

    public function edit($id)
    {
        try {
            $tipos = Role::where('status', '1')->get();
            $personal = User::findOrFail($id);
            $personalTipo = $personal->roles->all();

            return view('registro.personal.edit', compact('tipos', 'personal', 'personalTipo'));
        } catch (\Exception $e) {
            dd($e);
            abort(404);
        }
    }

    public function update(PersonalUpdateRequest $request, $id)
    {
        try {
            DB::beginTransaction();
            $personal = User::findOrFail($id);
            $personal->nombres = $request->nombres;
            $personal->apellidos = $request->apellidos;
            $personal->email = $request->email;
            $personal->password = bcrypt($request->contrasenia);
            $personal->update();

            # REASIGNACION DE ROL
            DB::table('model_has_roles')->where('model_id', $id)->delete();
            $personal->assignRole($request->input('tipo'));

            DB::commit();
            return redirect()->route('personal.index')->with('update', 'Registro actualizado');
        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->back()->with('error', 'Ups! Ha ocurrido un error inesperado, por favor inténtelo nuevamente');
        }
    }

    function destroy($id)
    {
        try {
            $personal = User::findOrFail($id);
            $personal->estado = 0;
            $personal->update();

            return redirect()->route('personal.index')->with('delete', 'Registro dado de baja');
        } catch (\Exception $ex) {
            return redirect()->back()->with('error', 'Ups! Ha ocurrido un error inesperado, por favor inténtelo nuevamente');
        }
    }
}
