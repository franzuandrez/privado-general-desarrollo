<?php

namespace App;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;

class Cita extends Model
{
    protected $table = 'cita';
    protected $dates = ['fecha_cita', 'fecha_grabo'];

    protected $fillable = ['id_paciente', 'motivo', 'fecha_cita', 'fecha_genero'];
    public $timestamps = false;

    public function scopeActive(Builder $query)
    {
        return $query->where('cita.estado', '=', 1);
    }

    public function scopejoinCita(Builder $query)
    {
        return $query->join('paciente', 'paciente.id', '=', 'id_paciente')
            ->select('cita.*', 'paciente.nombres', 'paciente.apellidos');
    }

    public function paciente(){
        return $this->hasOne(Paciente::class, 'id', 'id_paciente');
    }
}
