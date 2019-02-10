<?php

namespace App\Repositories;

use Cartalyst\Sentinel\Sentinel as Auth;

class RoleRepository
{

    private $auth;
    private $role;

    public function __construct(Auth $auth)
    {
        $this->auth = $auth;
        $this->role = $auth->getRoleRepository()->createModel();
    }

    /**
     * Get all requested roles
     *
     * @param array $data
     *
     * @return mixed
     */
    public function getAll(array $data)
    {
        $search = isset($data['search']) ? $data['search'] : '';

        $sortBy = isset($data['sort_by']) ? $data['sort_by'] : 'name';
        $sortType = isset($data['sort_type']) ? $data['sort_type'] : 'ASC';

        return $this->role->where("name", "LIKE", "%$search%")
            ->orderBy($sortBy, $sortType)
            ->paginate(15)
            ->appends([
                'search' => $search,
                'sort_by' => $sortBy,
                'sort_type' => $sortType,
            ]);
    }

    /**
     * Get all roles
     *
     * @return mixed
     */
    public function getAllRoles()
    {
        return $this->role->all();
    }

    /**
     * Get the role
     *
     * @param integer $id
     *
     * @return mixed
     */
    public function get($id)
    {
        return $this->role->find($id);
    }

    /**
     * Create new role
     *
     * @param array $data
     */
    public function create(array $data)
    {
        $role = $this->role->create($data);

        return $role;
    }

    /**
     * Update role information
     *
     * @param integer $id
     * @param array $data
     *
     * @return mixed
     */
    public function update($id, array $data)
    {
        $role = $this->get($id);

        $role->name = $data['name'];
        $role->slug = $data['slug'];
        $role->permissions = isset($data['permissions']) ? $data['permissions'] : [];

        return $role->save();
    }

    /**
     * Delete role
     *
     * @param integer $id
     *
     * @return mixed
     */
    public function destroy($id)
    {
        $role = $this->get($id);

        return $role->delete();
    }

    /**
     * Assign renter role to the user
     *
     * @param  User $user
     * @param  array $data
     */
    public function assignRole($user, $data)
    {
        $role = $this->auth->findRoleById($data['user_roles']['id']);
        $role->users()->attach($user);
    }

    /**
     * Assign renter role to the user
     *
     * @param  User $user
     */
    public function assignRenterRole($user)
    {
        $role = $this->auth->findRoleById(2);
        $role->users()->attach($user);
    }

    /**
     * Assign landlord role to the user
     *
     * @param  User $user
     */
    public function assignLandlordRole($user)
    {
        $role = $this->auth->findRoleById(3);
        $role->users()->attach($user);
    }

    /**
     * Get master permission list
     *
     * @return array
     */
    public function getMasterPermissions()
    {
        return [
            'dashboard' => [
                '' => 'View',
            ],

            'role' => [
                '' => 'List',
                'add' => 'Create',
                'show' => 'Update',
                'delete' => 'Delete',
            ],

            'user' => [
                '' => 'List',
                'add' => 'Create',
                'show' => 'Update',
                'delete' => 'Delete',
            ],
        ];
    }

    /**
     * Get master permission list
     *
     * @return array
     */
    public function getMasterPermissionsMapping()
    {
        return [

        ];
    }

}
