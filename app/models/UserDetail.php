<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class UserDetail extends Model
{
    protected $casts = [
        'created_at' => 'datetime:d/m/Y, h:iA',
        'updated_at' => 'datetime:d/m/Y, h:iA',
        'dob' => 'datetime:d/m/Y',
        'phone_verified' => 'boolean',
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
