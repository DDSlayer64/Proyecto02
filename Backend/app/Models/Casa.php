<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Casa extends Model
{
    protected $table='casas';
    //
    protected $fillable = [
        'ubicacion',
        'extencion'
    ];
}
