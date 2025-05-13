<?php

namespace App\Http\Controllers;

use App\Models\Evaluation;
use Illuminate\Http\Request;

class EvaluationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $evaluations = Evaluation::paginate(10);
        return view('evaluations.index', compact('evaluations'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('evaluations.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'user_id' => 'required|exists:users,id',
            'groupe_id' => 'required|exists:groupes,id',
            'matiere_id' => 'required|exists:matieres,id',
            'type_evaluation_id' => 'required|exists:types_evaluation,id',
            'annee_scolaire_id' => 'required|exists:annees_scolaires,id',
        ]);

        Evaluation::create($request->all());
        return redirect()->route('evaluations.index')->with('success', 'Evaluation added successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $evaluation = Evaluation::find($id);
        return view('evaluations.show', compact('evaluation'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $evaluation = Evaluation::find($id);
        return view('evaluations.edit', compact('evaluation'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $evaluation = Evaluation::findOrFail($id);
        $request->validate([
            'user_id' => 'sometimes|exists:users,id',
            'groupe_id' => 'sometimes|exists:groupes,id',
            'matiere_id' => 'sometimes|exists:matieres,id',
            'type_evaluation_id' => 'sometimes|exists:types_evaluation,id',
            'annee_scolaire_id' => 'sometimes|exists:annees_scolaires,id',
        ]);

        $evaluation->update($request->all());
        return redirect()->route('evaluations.index')->with('success', 'Evaluation updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Evaluation::findOrFail($id)->delete();
        return redirect()->route('evaluations.index')->with('success', 'Evaluation deleted successfully.');
    }
}
