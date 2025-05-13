<?php

namespace App\Http\Controllers;

use App\Models\Matiere;
use Illuminate\Http\Request;

class MatiereController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $matieres = Matiere::paginate(10);
        return view('matieres.index', compact('matieres'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('matieres.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate(['matiere' => 'required|string|unique:matieres']);
        Matiere::create($request->all());
        return redirect()->route('matieres.index')->with('success', 'Matiere created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $matiere = Matiere::find($id);
        return view('matieres.show', compact('matiere'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $matiere = Matiere::find($id);
        return view('matieres.edit', compact('matiere'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $matiere = Matiere::findOrFail($id);
        $request->validate(['matiere' => 'required|string|unique:matieres,matiere,' . $id]);
        $matiere->update($request->all());
        return redirect()->route('matieres.index')->with('success', 'Matiere updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Matiere::destroy($id);
        return redirect()->route('matieres.index')->with('success', 'Matiere deleted successfully.');
    }
}
