<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Hemograma extends Model
{
    use HasFactory;
    protected $fillable=[
        'requerido',
        'tipomuestra',
        'fechatoma',
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
        'd18',
        'd19',
        'd20',
        'd21',
        'd22',
        'd23',
        'd24',
        'd25',
        'd26',
        'd27',
        'd28',
        'd29',
        'd30',
        'd31',
        'd32',
        'd33',
        'paciente_id',
        'user_id',
    ];
    
    protected $hidden = ["created_at", "updated_at"];
    public function paciente(){
        return $this->belongsTo(Paciente::class);
    }
    public function user(){
        return $this->belongsTo(User::class);
    }
}
