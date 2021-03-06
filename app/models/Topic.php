<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Topic extends Model
{
    protected $casts = [
        'related_group_ids' => 'array',
        'related_subject_ids' => 'array',
        'semester_ids' => 'array',
    ];

    public function content()
    {
        return $this->hasMany(TopicContent::class);
    }
}
