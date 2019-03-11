<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class QuestionPaperSection extends Model
{
    protected $casts = [
    ];

    public function model()
    {
        return $this->belongsTo(QuestionPaperModel::class);
    }
}
