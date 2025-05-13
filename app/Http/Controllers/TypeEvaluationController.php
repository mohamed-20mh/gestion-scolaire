<?php

namespace App\Http\Controllers;

use App\Models\TypeEvaluation;
use Illuminate\Http\Request;

class TypeEvaluationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $types_evaluations = TypeEvaluation::paginate(10);
        return view('types_evaluations.index', compact('types_evaluations'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('types_evaluations.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate(['type_evaluation' => 'required|string|unique:types_evaluation,type_evaluation']);

        TypeEvaluation::create($request->all());
        return redirect()->route('types_evaluations.index')->with('success', 'Type Evaluation created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $type_evaluation = TypeEvaluation::find($id);
        return view('types_evaluations.show', compact('type_evaluation'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $type_evaluation = TypeEvaluation::find($id);
        return view('types_evaluations.edit', compact('type_evaluation'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $type_evaluation = TypeEvaluation::findOrFail($id);
        $request->validate(['type_evaluation' => 'required|string|unique:types_evaluation,type_evaluation,' . $id]);

        $type_evaluation->update($request->all());
        return redirect()->route('types_evaluations.index')->with('success', 'Type Evaluation updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        TypeEvaluation::findOrFail($id)->delete();
        return redirect()->route('types_evaluations.index')->with('success', 'Type Evaluation deleted successfully.');
    }
}
