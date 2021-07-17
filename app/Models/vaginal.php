<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class vaginal extends Model
{
    use HasFactory;
    protected $fillable=[
        'requerido',
        'tipomuestra',
        'fechatoma',
        'fechaentrega',
        'd1',
        'd2',
        'd3',
        'd4',
        'd5',
        'd6',
        'd7',
        'd8',
        'd9',
        'd10',
        'd11',
        'd12',
        'd13',
        'd14',
        'd15',
        'd16',
        'd17',
        'paciente_id',
        'user_id',
    ];

}
