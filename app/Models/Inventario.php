<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Inventario extends Model
{
    use HasFactory;
    protected $fillable=[
        'fecha',
        'fechavencimiento',
        'marca',
        'lote',
        'ingreso',
        'saldo',
        'observacion',
        'estado',
        'reactivo_id',
        'user_id',
    ];

}
