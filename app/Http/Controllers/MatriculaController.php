<?php
namespace App\Http\Controllers;

use App\Models\Matricula;
use Illuminate\Http\Request;

class MatriculaController extends Controller
{
    public function store(Request $request)
    {

        $dados = $request->validate([
            'aluno_id' => 'required|exists:alunos,id',
            'turma_id' => 'required|exists:turmas,id'
        ]);

        $existe = Matricula::where('aluno_id', $dados['aluno_id'])
                           ->where('turma_id', $dados['turma_id'])
                           ->exists();

        if ($existe) {
            return response()->json(['error' => 'Aluno já matriculado nesta turma'], 409);
        }

        $matricula = Matricula::create($dados);
        return response()->json($matricula, 201);
    }

    public function destroy($id)
    {
        $matricula = Matricula::findOrFail($id);
        $matricula->delete();
        return response()->json(['message' => 'Matrícula cancelada com sucesso'], 200);
    }
}