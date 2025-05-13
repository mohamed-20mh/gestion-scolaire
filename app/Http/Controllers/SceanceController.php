<?php

namespace App\Http\Controllers;

use App\Models\Sceance;
use Illuminate\Http\Request;

class SceanceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $sceances = Sceance::paginate(10);
        return view('sceances.index', compact('sceances'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('sceances.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'heure_debut' => 'required|date_format:H:i',
            'heure_fin' => 'required|date_format:H:i|after:heure_debut',
            'groupe_id' => 'required|exists:groupes,id',
        ]);

        Sceance::create($request->all());
        return redirect()->route('sceacnes.index')->with('success', 'Sceance created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $sceance = Sceance::find($id);
        return view('sceances.show', compact('sceance'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $sceance = Sceance::find($id);
        return view('sceances.edit', compact('sceance'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $sceance = Sceance::findOrFail($id);
        $request->validate([
            'heure_debut' => 'sometimes|date_format:H:i',
            'heure_fin' => 'sometimes|date_format:H:i|after:heure_debut',
            'groupe_id' => 'sometimes|exists:groupes,id',
        ]);

        $sceance->update($request->all());
        return redirect()->route('sceacnes.index')->with('success', 'Sceance updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Sceance::findOrFail($id)->delete();
        return redirect()->route('sceacnes.index')->with('success', 'Sceance deleted successfully.');
    }
}
