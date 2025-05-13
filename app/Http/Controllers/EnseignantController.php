<?php

namespace App\Http\Controllers;

use App\Models\Absence;
use App\Models\AnneeScolaire;
use App\Models\EnseignantGroupeMatiere;
use App\Models\Evaluation;
use App\Models\Groupe;
use App\Models\Note;
use App\Models\Sceance;
use App\Models\TypeEvaluation;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class EnseignantController extends Controller
{
    public function dashboard()
    {
        $enseignantId = Auth::id();

        $enseignantMatieres = EnseignantGroupeMatiere::with('matiere')
            ->where('user_id', $enseignantId)
            ->get()
            ->pluck('matiere')
            ->unique('id');

        $enseignantGroupes = EnseignantGroupeMatiere::with('groupe')
            ->where('user_id', $enseignantId)
            ->get()
            ->pluck('groupe')
            ->unique('id');

        return view('enseignant.dashboard', compact('enseignantMatieres', 'enseignantGroupes'));
    }

    public function evaluations()
    {
        $enseignantId = Auth::id();

        $evaluations = Evaluation::with('matiere', 'groupe')
            ->where('user_id', $enseignantId)
            ->get();

        return view('enseignant.evaluations', compact('evaluations'));
    }

    public function createEvaluation()
    {
        $enseignantId = Auth::id();

        // recuperer les matieres et groupes lies à cet enseignant
        $matiereGroupes = \App\Models\EnseignantGroupeMatiere::with('matiere', 'groupe')
                            ->where('user_id', $enseignantId)
                            ->get();

        $types = TypeEvaluation::all();
        $annees = AnneeScolaire::all();

        return view('enseignant.evaluations-create', compact('matiereGroupes', 'types', 'annees'));
    }

    public function storeEvaluation(Request $request)
    {
        $request->validate([
            'groupe_id' => 'required',
            'matiere_id' => 'required',
            'type_evaluation_id' => 'required',
            'annee_scolaire_id' => 'required'
        ]);

        Evaluation::create([
            'user_id' => Auth::id(),
            'groupe_id' => $request->groupe_id,
            'matiere_id' => $request->matiere_id,
            'type_evaluation_id' => $request->type_evaluation_id,
            'annee_scolaire_id' => $request->annee_scolaire_id
        ]);

        return redirect()->route('enseignant.evaluations')->with('success', 'Évaluation ajoutée avec succès.');
    }

    public function showEvaluation($id)
    {
        $evaluation = Evaluation::findOrFail($id);

        return view('enseignant.evaluations-show', compact('evaluation'));
    }

    public function editEvaluation($id)
    {
        $evaluation = Evaluation::findOrFail($id);

        return view('enseignant.evaluations-edit', compact('evaluation'));
    }

    public function updateEvaluation(Request $request, $id)
    {
        $evaluation = Evaluation::findOrFail($id);

        $evaluation->update($request->validate([
            'type_evaluation_id' => 'required|exists:type_evaluations,id',
            'groupe_id' => 'required|exists:groupes,id',
            'matiere_id' => 'required|exists:matieres,id',
            'annee_scolaire_id' => 'required|exists:annee_scolaires,id',
        ]));

        return redirect()->route('enseignant.evaluations')->with('success', 'Évaluation mise à jour avec succès.');
    }

    public function destroyEvaluation($id)
    {
        $evaluation = Evaluation::findOrFail($id);
        $evaluation->delete();

        return redirect()->route('enseignant.evaluations')->with('success', 'Évaluation supprimée.');
    }

    public function notesParEvaluation($id)
    {
        $evaluation = Evaluation::findOrFail($id);
        $notes = Note::where('evaluation_id', $id)->get();

        return view('enseignant.notes-evaluation', compact('evaluation', 'notes'));
    }

    public function createNotes($id)
    {
        $evaluation = Evaluation::findOrFail($id);
        $groupe = $evaluation->groupe;
        $eleves = User::where('groupe_id', $groupe->id)->where('role', 'eleve')->get();

        return view('enseignant.notes-create', compact('evaluation', 'groupe', 'eleves'));
    }

    public function storeNotes(Request $request, $id)
    {
        $evaluation = Evaluation::findOrFail($id);

        foreach ($request->notes as $noteData) {
            Note::create([
                'note' => $noteData['note'],
                'user_id' => $noteData['user_id'],
                'evaluation_id' => $evaluation->id,
            ]);
        }

        return redirect()->route('enseignant.evaluations')->with('success', 'Notes ajoutées avec succès.');
    }

    public function editNotes($id)
    {
        $evaluation = Evaluation::findOrFail($id);
        $groupe = $evaluation->groupe;

        // rcuperer les notes avec les eleves
        $notes = Note::where('evaluation_id', $id)->with('eleve')->get();

        return view('enseignant.notes-edit', compact('evaluation', 'groupe', 'notes'));
    }

    public function updateNotes(Request $request, $id)
    {
        foreach ($request->notes as $noteData) {
            $note = Note::findOrFail($noteData['note_id']);
            $note->update([
                'note' => $noteData['note'],
            ]);
        }

        return redirect()->route('enseignant.evaluations')->with('success', 'Notes mises à jour avec succès.');
    }

    public function destroyNotes($id)
    {
        $note = Note::find($id);

        if (!$note) {
            return redirect()->back()->with('error', 'Note non trouvée.');
        }

        $note->delete();

        return redirect()->back()->with('success', 'Note supprimée avec succès.');
    }
    // Absences
    public function groupesAbsences()
    {
        $enseignantId = Auth::id();

        $groupes = Groupe::whereHas('enseignantGroupeMatiere', function($query) use ($enseignantId) {
            $query->where('user_id', $enseignantId);
        })->get();

        return view('enseignant.absences-groupe', compact('groupes'));
    }

    public function indexAbsences($groupe_id)
    {
        $enseignantId = Auth::id();

        $groupe = Groupe::whereHas('enseignantGroupeMatiere', function($query) use ($enseignantId) {
            $query->where('user_id', $enseignantId);
        })->findOrFail($groupe_id);

        $absences = Absence::with(['user', 'sceance'])
            ->whereHas('user', function($query) use ($groupe_id) {
                $query->where('groupe_id', $groupe_id);
            })
            ->get();

        return view('enseignant.absences', compact('absences', 'groupe'));
    }

    public function createAbsence($groupe_id)
    {
        $enseignantId = Auth::id();

        $groupe = Groupe::whereHas('enseignantGroupeMatiere', function($query) use ($enseignantId) {
            $query->where('user_id', $enseignantId);
        })->findOrFail($groupe_id);

        $eleves = User::where('groupe_id', $groupe_id)->where('role', 'eleve')->get();
        $sceances = Sceance::where('groupe_id', $groupe_id)->get();

        return view('enseignant.absences-create', compact('groupe', 'eleves', 'sceances'));
    }

    public function storeAbsence(Request $request)
    {
        $enseignantId = Auth::id();

        $request->validate([
            'user_id' => 'required|exists:users,id',
            'sceance_id' => 'required|exists:sceances,id',
            'justifier' => 'required|boolean',
        ]);

        $eleve = User::where('id', $request->user_id)
            ->where('role', 'eleve')
            ->firstOrFail();

        $sceance = Sceance::findOrFail($request->sceance_id);

        // Vérifie que l'enseignant enseigne ce groupe
        $groupe = Groupe::whereHas('enseignantGroupeMatiere', function($query) use ($enseignantId) {
            $query->where('user_id', $enseignantId);
        })->findOrFail($sceance->groupe_id);

        if ($eleve->groupe_id != $groupe->id) {
            abort(403, 'Non autorisé.');
        }

        Absence::create([
            'user_id' => $request->user_id,
            'sceance_id' => $request->sceance_id,
            'justifier' => $request->justifier,
        ]);

        return redirect()->back()->with('success', 'Absence ajoutée avec succès.');
    }

    public function editAbsence($id)
    {
        $enseignantId = Auth::id();

        $absence = Absence::with(['user', 'sceance'])->findOrFail($id);

        $groupe = Groupe::whereHas('enseignantGroupeMatiere', function($query) use ($enseignantId) {
            $query->where('user_id', $enseignantId);
        })->findOrFail($absence->sceance->groupe_id);

        if ($absence->user->groupe_id != $groupe->id) {
            abort(403, 'Non autorisé.');
        }

        return view('enseignant.absences-edit', compact('absence'));
    }

    public function updateAbsence(Request $request, $id)
    {
        $enseignantId = Auth::id();

        $request->validate([
            'justifier' => 'required|boolean',
        ]);

        $absence = Absence::with(['user', 'sceance'])->findOrFail($id);

        $groupe = Groupe::whereHas('enseignantGroupeMatiere', function($query) use ($enseignantId) {
            $query->where('user_id', $enseignantId);
        })->findOrFail($absence->sceance->groupe_id);

        if ($absence->user->groupe_id != $groupe->id) {
            abort(403, 'Non autorisé.');
        }

        $absence->update([
            'justifier' => $request->justifier,
        ]);

        return redirect()->back()->with('success', 'Absence modifiée avec succès.');
    }

    public function destroyAbsence($id)
    {
        $enseignantId = Auth::id();

        $absence = Absence::with(['user', 'sceance'])->findOrFail($id);

        $groupe = Groupe::whereHas('enseignantGroupeMatiere', function($query) use ($enseignantId) {
            $query->where('user_id', $enseignantId);
        })->findOrFail($absence->sceance->groupe_id);

        if ($absence->user->groupe_id != $groupe->id) {
            abort(403, 'Non autorisé.');
        }

        $absence->delete();

        return redirect()->back()->with('success', 'Absence supprimée avec succès.');
    }
}
