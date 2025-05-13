<?php

namespace App\Http\Controllers;

use App\Models\Absence;
use Illuminate\Http\Request;

class AbsenceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $absences = Absence::paginate(10);
        return view('absences.index', compact('absences'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('absences.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'user_id' => 'required|exists:users,id',
            'sceance_id' => 'required|exists:sceances,id',
            'justifier' => 'boolean',
        ]);

        Absence::create($request->all());
        return redirect()->route('absences.index')->with('success', 'Absence added successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $absence = Absence::find($id);
        return view('absences.show', compact('absence'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $absence = Absence::find($id);
        return view('absences.edit', compact('absence'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $absence = Absence::findOrFail($id);
        $request->validate([
            'user_id' => 'sometimes|exists:users,id',
            'sceance_id' => 'sometimes|exists:sceances,id',
            'justifier' => 'boolean',
        ]);
        $absence->update($request->all());
        return redirect()->route('absences.index')->with('success', 'Absence updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Absence::findOrFail($id)->delete();
        return redirect()->route('absences.index')->with('success', 'Absence deleted successfully.');
    }
}
