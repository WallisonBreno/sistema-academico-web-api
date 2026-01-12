<?php
namespace App\Http\Controllers;

use App\Models\Professor;
use Illuminate\Http\Request;

class ProfessorController extends Controller
{
    public function index()
    {
        return response()->json(Professor::all());
    }

    public function store(Request $request)
    {
        $dados = $request->validate([
            'nome' => 'required|string',
            'sobrenome' => 'required|string',
            'email' => 'nullable|email'
        ]);

        $professor = Professor::create($dados);
        return response()->json($professor, 201);
    }

    public function show($id)
    {
        return response()->json(Professor::findOrFail($id)); 
    }

    public function update(Request $request, $id)
    {
        $professor = Professor::findOrFail($id);
        $professor->update($request->all());
        return response()->json($professor);
    }

    public function destroy($id)
    {
        Professor::findOrFail($id)->delete(); 
        return response()->json(null, 204);
    }
}