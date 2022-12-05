<?php

namespace App;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;

class Paciente extends Model
{
    protected $table = 'paciente';
    protected $dates = ['fecha_nacimiento'];

    protected $fillable = ['nombres', 'apellidos', 'fecha_nacimiento'];
    public $timestamps = false;

    public function scopeActive(Builder $query)
    {
        return $query->where('paciente.estado', 1);
    }
}
