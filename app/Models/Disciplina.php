<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Disciplina extends Model
{
    public function curso() 
    { 
        return $this->belongsTo(Curso::class); 
    }
    public function turmas() 
    { 
        return $this->hasMany(Turma::class); 
    }
}
