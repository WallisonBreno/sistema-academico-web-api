<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Turma extends Model
{
    protected $fillable = ['disciplina_id', 'professor_id'];
    public function disciplina() { return $this->belongsTo(Disciplina::class); }
    public function professor() { return $this->belongsTo(Professor::class); }
    public function matriculas() { return $this->hasMany(Matricula::class); }

    public function alunos() {
        return $this->belongsToMany(Aluno::class, 'matriculas', 'turma_id', 'aluno_id');
    }
}
