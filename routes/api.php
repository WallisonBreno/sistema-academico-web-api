<?php

use App\Http\Controllers\AlunoController;
use App\Http\Controllers\ProfessorController;
use App\Http\Controllers\CursoController;
use App\Http\Controllers\DisciplinaController;
use App\Http\Controllers\TurmaController;
use App\Http\Controllers\MatriculaController;
use Illuminate\Support\Facades\Route;

Route::apiResource('cursos', CursoController::class);
Route::apiResource('disciplinas', DisciplinaController::class);
Route::apiResource('professores', ProfessorController::class);
Route::apiResource('alunos', AlunoController::class);
Route::apiResource('turmas', TurmaController::class);

Route::post('matriculas', [MatriculaController::class, 'store']); 
Route::delete('matriculas/{matricula}', [MatriculaController::class, 'destroy']);

Route::get('turmas/{turma}/alunos', [TurmaController::class, 'alunos']);