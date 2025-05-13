<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Matiere extends Model
{
    use HasFactory, SoftDeletes;

    protected $guarded = ['id'];

    public function enseignements()
    {
        return $this->hasMany(EnseignantGroupeMatiere::class);
    }

    public function evaluations()
    {
        return $this->hasMany(Evaluation::class);
    }
}
