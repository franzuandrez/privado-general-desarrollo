<?php

namespace App\Http\Controllers;

use App\Http\Requests\RolRequest;
use App\Http\Requests\RolUpdateRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RolController extends Controller
{
    public function index()
    {
        $collection = Role::where('status', 1)->get();
        return view('registro.tipo_personal.index', compact('collection'));
    }

    public function create()
    {
        $menus = Permission::where('orden_menu', '!=', '0')
            ->orderBy('orden_menu', 'ASC')
            ->where('status', 1)
            ->get();

        $opciones = Permission::where('id_menu', '!=', '0')
            ->where('status', 1)
            ->get();
        return view('registro.tipo_personal.create', compact('menus', 'opciones'));
    }


    public function store(RolRequest $request)
    {
        try {
            $role = Role::create([
                'name' => $request->input('tipo'),
            ]);

            $role->syncPermissions($request->input('permission'));

            return redirect()->route('tipo_personal.index')->with('store', 'Registro agregado');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Ups! Ha ocurrido un error inesperado, por favor inténtelo nuevamente');
        }
    }

    public function edit($id)
    {
        try {
            $role = Role::findOrFail($id);

            $menus = Permission::where('orden_menu', '!=', '0')
                ->where('status', 1)
                ->orderBy('orden_menu', 'ASC')->get();

            $opciones = Permission::where('id_menu', '!=', '0')
                ->where('status', 1)
                ->get();

            $rolePermissions = DB::table("role_has_permissions")
                ->where("role_has_permissions.role_id", $id)
                ->pluck('role_has_permissions.permission_id', 'role_has_permissions.permission_id')
                ->all();

            return view('registro.tipo_personal.edit', compact('role', 'menus', 'opciones', 'rolePermissions'));
        } catch (\Exception $e) {
            abort(500);
        }
    }

    public function update(RolUpdateRequest $request, $id)
    {
        try {
            $role = Role::findOrFail($id);

            $role->name = $request->input('tipo');
            $role->save();

            $role->syncPermissions($request->input('permission'));

            return redirect()->route('tipo_personal.index')->with('update', 'Registro actualizado');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Ups! Ha ocurrido un error inesperado, por favor inténtelo nuevamente');
        }
    }

    public function destroy($id)
    {
        try {
            $role = Role::find($id);
            $role->status = 0;
            $role->update();

            return redirect()->route('tipo_personal.index')->with('delete', 'Registro dado de baja');
        } catch (\Exception $ex) {
            return redirect()->back()->with('error', 'Ups! Ha ocurrido un error inesperado, por favor inténtelo nuevamente');
        }
    }
}
