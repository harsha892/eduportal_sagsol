<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;

class Topic extends Model
{
    protected $casts = [
        'related_group_ids' => 'array',
        'related_subject_ids' => 'array',
        'semister_ids' => 'array',
    ];
}
