<?php
namespace App\Http\Controllers;

use App\Models\Aluno;
use Illuminate\Http\Request;

class AlunoController extends Controller
{
    public function index()
    {
        return response()->json(Aluno::with('curso')->get());
    }

    public function store(Request $request)
    {
        $dados = $request->validate([
            'nome' => 'required|string',
            'sobrenome' => 'required|string',
            'matricula' => 'required|unique:alunos,matricula',
            'data_nascimento' => 'required|date',
            'curso_id' => 'required|exists:cursos,id'
        ]);

        $aluno = Aluno::create($dados);
        return response()->json($aluno, 201);
    }

    public function show($id)
    {
        $aluno = Aluno::with('curso')->findOrFail($id);
        return response()->json($aluno);
    }

    public function update(Request $request, $id)
    {
        $aluno = Aluno::findOrFail($id);
        
        $dados = $request->validate([
            'nome' => 'string',
            'sobrenome' => 'string',
            'matricula' => 'unique:alunos,matricula,'.$id,
            'data_nascimento' => 'date',
            'curso_id' => 'exists:cursos,id'
        ]);

        $aluno->update($dados);
        return response()->json($aluno);
    }

    public function destroy($id)
    {
        Aluno::findOrFail($id)->delete(); 
        return response()->json(null, 204);
    }
}