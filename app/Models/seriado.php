<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class seriado extends Model
{
    use HasFactory;
    protected $fillable=[
        'requerido',
        'tipomuestra',
        'muestra1',
        'fecha1',
        'hora1',
        'd1',
        'muestra2',
        'fecha2',
        'hora2',
        'd2',
        'muestra3',
        'fecha3',
        'hora3',
        'd3',
        'observaciones',
        'paciente_id',
        'user_id',
        
    ];
}
