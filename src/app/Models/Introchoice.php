<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Introchoice extends Model
{
    use HasFactory;

    protected $fillable = ['text', 'question_id', 'is_correct'];

    public function introQuestion()
    {
        return $this->belongsTo(introquestion::class);
    }
}
