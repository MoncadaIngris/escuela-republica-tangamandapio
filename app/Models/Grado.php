<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Grado extends Model
{
    use HasFactory;
    public function alumnos(){
        return $this->hasMany(Alumno::class);
    }

    public function profesors(){
        return $this->hasMany(ProfesorGrado::class);
    }
}
