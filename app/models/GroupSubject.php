<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class GroupSubject extends Model
{

    protected $hidden = ['created_at', 'updated_at', 'deleted_at', 'subject'];

    public $appends = [
        'name',
        'slug',
    ];

    public function subject()
    {
        return $this->belongsTo(Subject::class);
    }

    public function getNameAttribute()
    {
        return $this->subject->name;
    }

    public function getSlugAttribute()
    {
        return $this->subject->slug;
    }
}
