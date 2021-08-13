<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reactivo extends Model
{
    use HasFactory;
    protected $fillable=[
        'nombre',
        'codigo',
        'estado',
        'user_id'
    ];

    protected $hidden = ["created_at", "updated_at"];

    public function inventarios(){
        return $this->hasMany(Inventario::class);
    }
    public function retiros(){
        return $this->hasMany(Retiro::class);
    }

}
