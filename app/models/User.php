<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;

class User extends Model
{

    protected $hidden = ['contact_id','password'];
    
    public function contact() {
        return $this->hasOne(Contact::class); //contacts -> contact_id 
    }

}
