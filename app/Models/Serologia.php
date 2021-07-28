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
        'd1',
        'd2',
        'd3',
        'd4',
        'paciente_id',
        'user_id',
        
    ];
}
