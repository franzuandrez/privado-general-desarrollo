<?php

namespace App;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;

class MedicamentoPresentacion extends Model
{
    protected $table = 'medicamento_presentacion';
    protected $fillable = ['id_medicamento', 'id_presentacion'];
    public $timestamps = false;

    public function scopeActive(Builder $query)
    {
        return $query->where('estado', 1);
    }

    public function scopeQueryPresentaciones(Builder $query)
    {
        return $query->join('presentacion', 'presentacion.id', '=', 'medicamento_presentacion.id_presentacion')
            ->select('presentacion.*');
    }

}
