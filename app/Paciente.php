<?php

namespace App;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;

class Paciente extends Model
{
    protected $table = 'paciente';
    protected $dates = ['fecha_nacimiento'];

    protected $fillable = [

        'cui',
        'primer_nombre',
        'segundo_nombre',
        'primer_apellido',
        'segundo_apellido',
        'fecha_nacimiento'];
    public $timestamps = false;



    public function scopeActive(Builder $query)
    {
        return $query->where('paciente.estado', 1);
    }
}
