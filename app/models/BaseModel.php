<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BaseModel extends Model
{
    use \Venturecraft\Revisionable\RevisionableTrait;
    use \Illuminate\Database\Eloquent\SoftDeletes;
    protected $dates = ['deleted_at'];

    public static function boot()
    {
        parent::boot();
    }
}
