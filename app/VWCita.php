<?php

namespace App;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;

class VWCita extends Model
{
    protected $table = 'vw_cita';
    protected $dates = ['fecha_cita', 'fecha_genero'];

    public function scopeActive(Builder $query)
    {
        return $query->where('estado', '=', 1);
    }
}
