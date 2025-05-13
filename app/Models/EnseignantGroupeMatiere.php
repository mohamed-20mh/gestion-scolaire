<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class EnseignantGroupeMatiere extends Model
{
    use HasFactory, SoftDeletes;

    protected $guarded = ['id'];

    public function enseignant()
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

    public function anneeScolaire()
    {
        return $this->belongsTo(AnneeScolaire::class);
    }
}
