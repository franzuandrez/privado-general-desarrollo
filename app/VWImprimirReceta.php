<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class VWImprimirReceta extends Model
{
    protected $table = 'vw_imprimir_receta';
    protected $primaryKey = 'id_cita';
}
