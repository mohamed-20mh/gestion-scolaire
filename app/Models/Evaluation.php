<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Evaluation extends Model
{
    use HasFactory, SoftDeletes;

    protected $guarded = ['id'];

    public function eleve()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function groupe()
    {
        return $this->belongsTo(Groupe::class);
    }

    public function matiere()
    {
        return $this->belongsTo(Matiere::class);
    }

    public function typeEvaluation()
    {
        return $this->belongsTo(TypeEvaluation::class);
    }

    public function anneeScolaire()
    {
        return $this->belongsTo(AnneeScolaire::class);
    }

    public function notes()
    {
        return $this->hasMany(Note::class);
    }
}
