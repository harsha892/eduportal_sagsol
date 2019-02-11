<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Subject extends Model
{
    protected $casts = [
        'related_group_ids' => 'array',
    ];
}
