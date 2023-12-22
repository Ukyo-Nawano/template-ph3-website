<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

// SoftDeletesを有効にすることで論理削除になる

class Quiz extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = ['name','question'];
    protected $dates = ['deleted_at'];

    public function questions()
    {
        return $this->hasMany(Question::class);
    }

    public function introQuestions()
    {
        return $this->hasMany(Introquestion::class);
    }
}
