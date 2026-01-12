<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Aluno extends Model
{
    protected $fillable = ['nome', 'sobrenome', 'matricula', 'data_nascimento', 'curso_id'];
    public function curso() 
    { 
        return $this->belongsTo(Curso::class); 
    }
    public function matriculas() 
    { 
        return $this->hasMany(Matricula::class); 
    }
}
