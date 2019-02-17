<?php

namespace App\Models;

class Group extends BaseModel
{
    public function subjects()
    {
        return $this->hasMany(GroupSubject::class);
    }
}
