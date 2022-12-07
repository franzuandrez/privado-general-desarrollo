<?php

namespace App;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;

class Medicamento extends Model
{
    protected $table = 'medicamento';
    protected $fillable = ['nombre', 'descripcion','precio'];
    public $timestamps = false;

    public function scopeActive(Builder $query)
    {
        return $query->where('estado', 1);
    }
}
