<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class QuestionPaperModel extends Model
{
    protected $casts = [
    ];

    public function sections()
    {
        return $this->hasMany(QuestionPaperSection::class, 'model_id');
    }
}
