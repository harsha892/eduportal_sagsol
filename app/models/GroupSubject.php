<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class GroupSubject extends Model
{

    protected $hidden = ['created_at', 'updated_at', 'deleted_at'];

    public function subject()
    {
        return $this->belongsTo(Subject::class);
    }
}
