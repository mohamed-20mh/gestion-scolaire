<?php

namespace App\Http\Controllers;

use App\Models\Groupe;
use Illuminate\Http\Request;

class GroupeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $groupes = Groupe::paginate(10);
        return view('groupes.index', compact('groupes'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('groupes.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'groupe' => 'required|string',
            'niveau_id' => 'required|exists:niveaux,id'
        ]);
        Groupe::create($request->all());
        return redirect()->route('groupes.index')->with('success', 'Groupe created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $groupe = Groupe::find($id);
        return view('groupes.show', compact('groupe'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $groupe = Groupe::find($id);
        return view('groupes.edit', compact('groupe'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $groupe = Groupe::findOrFail($id);
        $request->validate([
            'groupe' => 'required|string',
            'niveau_id' => 'required|exists:niveaux,id'
        ]);
        $groupe->update($request->all());
        return redirect()->route('groupes.index')->with('success', 'Groupe updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Groupe::destroy($id);
        return redirect()->route('groupes.index')->with('success', 'Groupe deleted successfully.');
    }
}
