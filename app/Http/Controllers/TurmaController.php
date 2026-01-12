<?php
namespace App\Http\Controllers;

use App\Models\Turma;
use Illuminate\Http\Request;

class TurmaController extends Controller
{
    public function index()
    {
        return response()->json(Turma::with(['disciplina', 'professor'])->get());
    }

    public function store(Request $request)
    {

        $dados = $request->validate([
            'disciplina_id' => 'required|exists:disciplinas,id',
            'professor_id' => 'required|exists:professores,id'
        ]);

        $turma = Turma::create($dados);
        return response()->json($turma, 201);
    }

    public function show($id)
    {
        return response()->json(Turma::with(['disciplina', 'professor'])->findOrFail($id));
    }

    public function alunos($id)
    {
        $turma = Turma::findOrFail($id);
        return response()->json($turma->alunos); 
    }

    public function destroy($id)
    {
        Turma::findOrFail($id)->delete();
        return response()->json(null, 204);
    }
}