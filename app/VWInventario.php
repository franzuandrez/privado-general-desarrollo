<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class VWInventario extends Model
{
    protected $table = 'vw_inventario';
    protected $dates = ['fecha_vencimiento', 'fecha_ingreso'];
}
