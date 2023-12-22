<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BigQuestion extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        // 他にも必要なプロパティがあればここに追加
    ];
}