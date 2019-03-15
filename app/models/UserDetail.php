<?php

namespace App\Models;

use Carbon\Carbon;

class UserDetail extends BaseModel
{
    use \Venturecraft\Revisionable\RevisionableTrait;
    use \Illuminate\Database\Eloquent\SoftDeletes;
    protected $dates = ['deleted_at'];

    public static function boot()
    {
        parent::boot();
    }

    protected $casts = [
        'created_at' => 'datetime:d/m/Y, h:iA',
        'updated_at' => 'datetime:d/m/Y, h:iA',
        'dob' => 'datetime:d/m/Y',
        'phone_verified' => 'boolean',
        'hobbies' => 'json',
        'languages' => 'json',
        'skills' => 'json',
        'references' => 'json',
    ];

    /**
     * Formatting the date
     *
     * @param  string $value
     *
     * @return void
     */
    public function setDobAttribute($value)
    {
        if (empty($value)) {
            $this->attributes['dob'] = null;
        } else {
            $this->attributes['dob'] = Carbon::createFromFormat(config('app.date_format'), $value);
        }
    }
}
