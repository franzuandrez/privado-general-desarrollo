<?php

namespace App;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;

class Presentacion extends Model
{
    protected $table = 'presentacion';
    protected $fillable = ['presentacion'];
    public $timestamps = false;

    public function scopeActive(Builder $query)
    {
        return $query->where('estado', 1);
    }
}
