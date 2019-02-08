<?php

namespace App\Transformers;

use App\User;
use League\Fractal\TransformerAbstract;

class UserTransformer extends TransformerAbstract
{
    /**
     * Related models to include in this transformation.
     *
     * @var array
     */
    protected $availableIncludes = [
        //
    ];

    /**
     * Turn this item object into a generic array.
     *
     * @param User $user
     * @return array
     */
    public function transform(User $user)
    {
        return [
            // attributes

            // links
            'links' => [
                [
                    'role_id' => $user->role_id,
                    'first_name' => $user->first_name,
                    'last_name' => $user->last_name,
                    'password' => $user->password,
                    'last_logined' => $user->last_logined,
                    'login_status' => $user->login_status,
                    'academic_year_start' => $user->academic_year_start,
                    'academic_year_end' => $user->academic_year_end,
                    'contact_id' => $user->contact_id
                ],
            ]
        ];
    }
}
