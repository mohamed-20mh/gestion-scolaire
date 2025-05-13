<?php

namespace App\Http\Controllers;

use App\Models\AnneeScolaire;
use Illuminate\Http\Request;

class AnneeScolaireController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $annees = AnneeScolaire::paginate(10);
        return view('annees_scolaires.index', compact('annees'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('annees_scolaires.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate(['annee_scolaire' => 'required|string|unique:annees_scolaires']);
        AnneeScolaire::create($request->all());
        return redirect()->route('annees_scolaires.index')->with('success', 'Annee Scolaire created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $annee = AnneeScolaire::find($id);
        return view('annees_scolaires.show', compact('annee'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $annee = AnneeScolaire::find($id);
        return view('annees_scolaires.edit', compact('annee'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $annee = AnneeScolaire::findOrFail($id);
        $request->validate(['annee_scolaire' => 'required|string|unique:annees_scolaires,annee_scolaire,' . $id]);
        $annee->update($request->all());
        return redirect()->route('annees_scolaires.index')->with('success', 'Annee Scolaire updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        AnneeScolaire::destroy($id);
        return redirect()->route('annees_scolaires.index')->with('success', 'Annee Scolaire deleted successfully.');
    }
}
