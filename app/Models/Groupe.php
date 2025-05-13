<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Groupe extends Model
{
    use HasFactory, SoftDeletes;

    protected $guarded = ['id'];

    public function niveau()
    {
        return $this->belongsTo(Niveau::class);
    }

    public function eleves()
    {
        return $this->hasMany(User::class);
    }

    public function sceances()
    {
        return $this->hasMany(Sceance::class);
    }

    public function enseignantGroupeMatiere()
    {
        return $this->hasMany(EnseignantGroupeMatiere::class, 'groupe_id');
    }
}
