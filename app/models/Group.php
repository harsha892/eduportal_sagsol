<?php

namespace App\Models;

class Group extends BaseModel
{
    protected $casts = [
        'is_active' => 'boolean',
    ];

    public function subjects()
    {
        return $this->hasMany(GroupSubject::class);
    }
}
