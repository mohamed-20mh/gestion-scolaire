<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Note extends Model
{
    use HasFactory, SoftDeletes;

    protected $guarded = ['id'];

    public function eleve()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function evaluation()
    {
        return $this->belongsTo(Evaluation::class);
    }
}
