<?php

namespace App\Http\Controllers;

use App\Models\EnseignantGroupeMatiere;
use Illuminate\Http\Request;

class EnseignantGroupeMatiereController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $records = EnseignantGroupeMatiere::paginate(10);
        return view('enseignant_groupe_matiere.index', compact('records'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('enseignant_groupe_matiere.create');
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
            'annee_scolaire_id' => 'required|exists:annees_scolaires,id',
        ]);

        EnseignantGroupeMatiere::create($request->all());
        return redirect()->route('enseignant_groupe_matiere.index')->with('success', 'Enregistrement created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $record = EnseignantGroupeMatiere::find($id);
        return view('enseignant_groupe_matiere.show', compact('record'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $record = EnseignantGroupeMatiere::find($id);
        return view('enseignant_groupe_matiere.edit', compact('record'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $record = EnseignantGroupeMatiere::findOrFail($id);
        $request->validate([
            'user_id' => 'sometimes|exists:users,id',
            'groupe_id' => 'sometimes|exists:groupes,id',
            'matiere_id' => 'sometimes|exists:matieres,id',
            'annee_scolaire_id' => 'sometimes|exists:annees_scolaires,id',
        ]);

        $record->update($request->all());
        return redirect()->route('enseignant_groupe_matiere.index')->with('success', 'Enregistrement updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        EnseignantGroupeMatiere::findOrFail($id)->delete();
        return redirect()->route('enseignant_groupe_matiere.index')->with('success', 'Enregistrement deleted successfully.');
    }
}
