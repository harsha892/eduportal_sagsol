<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    protected $casts = [
    ];

    public function answer()
    {
        return $this->hasMany(QuestionAnswer::class);
    }
}
