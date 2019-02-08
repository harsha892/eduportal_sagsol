<?php

namespace App\Transformers;

use App\Role;
use League\Fractal\TransformerAbstract;

class RoleTransformer extends TransformerAbstract
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
     * @param Role $role
     * @return array
     */
    public function transform(Role $role)
    {
        return [
            [
                'id' => $role->id,
                'name' => $role->name,
                'slug' => $role->slug,
                'permissions' => $role->permissions,
                'created_at' => $role->created_at,
                'updated_at' => $role->updated_at,
            ]
        ];
    }
}
