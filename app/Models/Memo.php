<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Memo extends Model
{
    use HasFactory;

    // 一括代入を許可するフィールド
    protected $fillable = [
        'title',
        'content'
    ];
}
