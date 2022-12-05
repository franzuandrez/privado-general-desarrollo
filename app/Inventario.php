<?php

namespace App;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;

class Inventario extends Model
{
    protected $table = 'inventario';
    protected $dates = ['fecha_vencimiento', 'fecha_ingreso'];

    protected $fillable = ['id_medicamento', 'id_presentacion', 'id_usuario_grabo', 'fecha_ingreso', 'fecha_vencimiento', 'total', 'observaciones'];
    public $timestamps = false;

    public function scopeJoinInventario(Builder $query)
    {
        return $query->join('medicamento', 'medicamento.id', '=', 'id_medicamento')
            ->join('presentacion', 'presentacion.id', '=', 'id_presentacion')
            ->join('users', 'users.id', '=', 'id_usuario_grabo')
            ->select('inventario.*', 'medicamento.nombre as medicamento', 'presentacion.presentacion as presentacion');
    }
}
