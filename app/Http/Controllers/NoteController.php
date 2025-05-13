<?php

namespace App\Http\Controllers;

use App\Models\Note;
use Illuminate\Http\Request;

class NoteController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $notes = Note::paginate(10);
        return view('notes.index', compact('notes'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('notes.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'note' => 'required|numeric|min:0|max:20',
            'user_id' => 'required|exists:users,id',
            'evaluation_id' => 'required|exists:evaluations,id',
        ]);

        Note::create($request->all());
        return redirect()->route('notes.index')->with('success', 'Note added successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $note = Note::find($id);
        return view('notes.show', compact('note'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $note = Note::find($id);
        return view('notes.edit', compact('note'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $note = Note::findOrFail($id);
        $request->validate([
            'note' => 'sometimes|numeric|min:0|max:20',
            'user_id' => 'sometimes|exists:users,id',
            'evaluation_id' => 'sometimes|exists:evaluations,id',
        ]);
        $note->update($request->all());
        return redirect()->route('notes.index')->with('success', 'Note updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Note::findOrFail($id)->delete();
        return redirect()->route('notes.index')->with('success', 'Note deleted successfully.');
    }
}
