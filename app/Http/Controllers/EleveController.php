<?php

namespace App\Http\Controllers;

use App\Models\Absence;
use App\Models\Note;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class EleveController extends Controller
{
    public function dashboard()
    {
        $userId = auth()->id();

        $totalNotes = Note::where('user_id', $userId)->count();
        $totalAbsences = Absence::where('user_id', $userId)->count();
        $moyenneGenerale = Note::where('user_id', $userId)->avg('note');

        $dernieresNotes = Note::where('user_id', $userId)
            ->with('evaluation.matiere')
            ->latest()
            ->take(2)
            ->get();

        $dernieresAbsences = Absence::where('user_id', $userId)
            ->with('sceance')
            ->latest()
            ->take(2)
            ->get();

        return view('eleve.dashboard', compact(
            'totalNotes',
            'totalAbsences',
            'moyenneGenerale',
            'dernieresNotes',
            'dernieresAbsences'
        ));
    }

    public function notes()
    {
        //$notes = Note::where('user_id', Auth::id())->with('evaluation')->get();
        //return view('eleve.notes', compact('notes'));

        /*$notes = Note::where('user_id', auth()->id())
        ->with(['evaluation.matiere', 'evaluation.typeEvaluation'])
        ->orderBy('created_at', 'desc')
        ->get();
        $notesParMatiere = $notes->groupBy(function ($item) {
            return $item->evaluation->matiere->matiere;
        });
        return view('eleve.notes', compact('notesParMatiere'));*/

        $notes = Note::where('user_id', auth()->id())
        ->with(['evaluation.matiere'])
        ->orderBy('evaluation_id')
        ->get();

        $notesParMatiere = [];

        foreach ($notes as $note) {
            $matiere = $note->evaluation->matiere->matiere;
            $notesParMatiere[$matiere][] = $note->note;
        }

        return view('eleve.notes', compact('notesParMatiere'));
    }

    public function absences()
    {
        $absences = Absence::where('user_id', Auth::id())->with('sceance')->get();
        return view('eleve.absences', compact('absences'));
    }
}
