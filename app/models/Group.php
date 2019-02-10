<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;

class Group extends Model
{
    protected $casts = [
        'subject_ids' => 'array',
    ];
    public function subjects() {
        return $this->hasMany(Subject::class, ''); //contacts -> contact_id 
    }
}
