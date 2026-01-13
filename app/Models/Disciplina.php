<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Disciplina extends Model
{
    protected $fillable = [
        'nome',
        'curso_id'
    ];
    public function curso() 
    { 
        return $this->belongsTo(Curso::class); 
    }
    public function turmas() 
    { 
        return $this->hasMany(Turma::class); 
    }
}
