<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Introquestion extends Model
{
    use HasFactory;

    protected $fillable = ['text', 'quiz_id'];

    public function introQuiz()
    {
        return $this->belongsTo(Introquiz::class);
    }

    public function introChoices()
    {
        return $this->hasMany(Introchoice::class);
    }
}
