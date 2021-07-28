<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Serologia extends Model
{
    use HasFactory;
    protected $fillable=[
        'requerido',
        'tipomuestra',
        'fechatoma',
        'lgm',
        'd1',
        'lgg',
        'd2',
        'd3',
        'paciente_id',
        'user_id',
        
    ];
}
