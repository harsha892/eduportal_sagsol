<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;

class Group extends Model
{
    protected $casts = [
        'related_subject_ids' => 'array',
    ];
}
