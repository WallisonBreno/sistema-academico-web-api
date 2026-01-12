<?php

namespace App\Http\Controllers;

use App\Models\Curso;
use Illuminate\Http\Request;

class CursoController extends Controller
{

    public function index()
    {
        return response()->json(Curso::all());
    }


    public function store(Request $request)
    {

        $dados = $request->validate([
            'nome' => 'required|string|max:255'
        ]);

        $curso = Curso::create($dados);

        return response()->json($curso, 201);
    }

    public function show($id)
    {
        $curso = Curso::findOrFail($id);
        return response()->json($curso);
    }

    public function update(Request $request, $id)
    {
        $curso = Curso::findOrFail($id);

        $dados = $request->validate([
            'nome' => 'required|string|max:255'
        ]);

        $curso->update($dados);

        return response()->json($curso);
    }

    public function destroy($id)
    {
        $curso = Curso::findOrFail($id);

        $curso->delete();

        return response()->json(null, 204);
    }
}