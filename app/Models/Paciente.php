<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Paciente extends Model
{
    use HasFactory;
    protected $fillable=['nombre','fechanac','sexo','celular'];
    public function age()
    {
        return Carbon::parse($this->attributes['fechanac'])->age;
    }
}
