<?php

namespace App\Http\Controllers;

use App\Models\Disciplina;
use Illuminate\Http\Request;

class DisciplinaController extends Controller
{

    public function index()
    {
        return response()->json(Disciplina::with('curso')->get());
    }

    public function store(Request $request)
    {
        $dados = $request->validate([
            'nome' => 'required|string|max:255',
            'curso_id' => 'required|exists:cursos,id'
        ]);

        $disciplina = Disciplina::create($dados);

        return response()->json($disciplina, 201);
    }

    public function show($id)
    {
        $disciplina = Disciplina::with('curso')->findOrFail($id);
        return response()->json($disciplina);
    }

    public function update(Request $request, $id)
    {
        $disciplina = Disciplina::findOrFail($id);

        $dados = $request->validate([
            'nome' => 'string|max:255',
            'curso_id' => 'exists:cursos,id'
        ]);

        $disciplina->update($dados);

        return response()->json($disciplina);
    }

    public function destroy($id)
    {
        $disciplina = Disciplina::findOrFail($id);
        $disciplina->delete();

        return response()->json(null, 204);
    }
}