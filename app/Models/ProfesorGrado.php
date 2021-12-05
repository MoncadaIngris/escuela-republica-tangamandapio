<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProfesorGrado extends Model
{
    use HasFactory;
    public function grado(){
        return $this->belongsTo(Grado::class, 'id_grado', 'id');
    }

    public function profesor(){
        return $this->belongsTo(Profesor::class, 'id_profesor', 'id');
    }
}
