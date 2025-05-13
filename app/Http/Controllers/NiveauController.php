<?php

namespace App\Http\Controllers;

use App\Models\Niveau;
use Illuminate\Http\Request;

class NiveauController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $niveaux = Niveau::paginate(10);
        return view('niveaux.index', compact('niveaux'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('niveaux.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate(['niveau' => 'required|string|unique:niveaux']);
        Niveau::create($request->all());
        return redirect()->route('niveaux.index')->with('success', 'Niveau created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $niveau = Niveau::find($id);
        return view('niveaux.show', compact('niveau'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $niveau = Niveau::find($id);
        return view('niveaux.edit', compact('niveau'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $niveau = Niveau::findOrFail($id);
        $request->validate(['niveau' => 'required|string|unique:niveaux,niveau,' . $id]);
        $niveau->update($request->all());
        return redirect()->route('niveaux.index')->with('success', 'Niveau updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Niveau::destroy($id);
        return redirect()->route('niveaux.index')->with('success', 'Niveau deleted successfully.');
    }
}
