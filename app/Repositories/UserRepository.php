<?php
namespace App\Repositories;

use App\Models\User;
use App\Models\UserDetail;
use Cartalyst\Sentinel\Activations\IlluminateActivationRepository as Activation;
use Cartalyst\Sentinel\Sentinel;
use Exception;
use Illuminate\Support\Facades\DB;
use Reminder;

class UserRepository
{
    /**
     * User instance
     *
     */
    private $user;

    /**
     * UserDetail instance
     *
     * @var UserDetail
     */
    private $userDetail;

    /**
     * RoleRepository instance
     *
     * @var RoleRepository
     */
    private $roleRepository;

    /**
     * Sentinel instance
     *
     */
    private $auth;

    /**
     * Activation instance
     *
     */
    private $activation;

    /**
     * UserRepository constructor.
     *
     * @param User $user
     * @param Sentinel $auth
     * @param UserDetail $userDetail
     */
    public function __construct(
        User $user,
        Sentinel $auth,
        Activation $activation,
        UserDetail $userDetail,
        RoleRepository $roleRepository
    ) {
        $this->user = $user;
        $this->auth = $auth;
        $this->activation = $activation;
        $this->userDetail = $userDetail;
        $this->roleRepository = $roleRepository;
        $this->role = $this->auth->getRoleRepository()->createModel();
    }

    /**
     * Create the user details
     *
     * @param User $user
     * @param array $data
     *
     * @return User
     */
    public function createUserDetail(User $user, array $data)
    {
        $this->assignUserDetails($this->userDetail, $data);
        $user->userDetail()->save($this->userDetail);

        return $user;
    }

    /**
     * Update the user details
     *
     * @param User $user
     * @param array $data
     *
     * @return User
     */
    public function updateUserDetail(User $user, array $data)
    {
        if ($user->userDetail) {
            $this->assignUserDetails($user->userDetail, $data);
            $user->userDetail->save();

            return $user;
        } else {
            return $this->createUserDetail($user, $data);
        }
    }

    /**
     * Get all requested users
     *
     * @param array $data
     *
     * @return mixed
     */
    public function getAll(array $data)
    {
        $search = isset($data['search']) ? $data['search'] : '';
        $sortBy = isset($data['sort_by']) ? $data['sort_by'] : 'email';
        $sortType = isset($data['sort_type']) ? $data['sort_type'] : 'ASC';
        $role = isset($data['role']) ? $data['role'] : '';

        $users = $this->auth->getUserRepository()->createModel()
            ->join('user_details', 'users.id', '=', 'user_details.user_id')
            ->join('role_users', 'users.id', '=', 'role_users.user_id')
            ->join('roles', 'roles.id', '=', 'role_users.role_id')
            ->select('users.*', 'user_details.first_name', 'user_details.last_name', 'user_details.phone', 'role_users.role_id', 'roles.name AS role')
            ->whereNotIn('role_users.role_id', [1])
            ->where(function ($s_query) use ($search, $role) {
                if (!empty($search)) {
                    $s_query->where('users.email', 'LIKE', "%$search%");
                    $s_query->orWhere(DB::raw("CONCAT(user_details.`first_name`, ' ',user_details.`last_name`)"), 'LIKE', "%$search%");
                }

                if (!empty($role)) {
                    $s_query->where('role_users.role_id', $role);
                }
            })
            ->orderBy($sortBy, $sortType)
            ->paginate(15)
            ->appends([
                'search' => $search,
                'sort_by' => $sortBy,
                'sort_type' => $sortType,
                'role' => $role,
            ]);

        foreach ($users as $key => $user) {
            $user->userDetail;
        }

        return $users;
    }

    /**
     * Get the user
     *
     * @param integer $id
     *
     * @return User
     */
    public function get($id)
    {
        $user = $this->auth->findById($id);
        if ($user) {
            $user->userDetail;
        }
        return $user;
    }

    /**
     * Get the user by token
     *
     * @param string $token
     *
     * @return User
     *
     * @throws Exception
     */
    public function getByToken($token)
    {
        $user = $this->user->where('token', $token)->first();

        if (is_null($user)) {
            throw new Exception('User not found');
        }

        return $user;
    }

    /**
     * Get the user by email
     *
     * @param string $email
     *
     * @return User
     */
    public function getByEmail($email)
    {
        return $this->user->where('email', $email)->first();
    }

    /**
     * Get the current user
     *
     * @return mixed
     */
    public function getCurrentUser()
    {
        return $this->auth->getUser();
    }

    /**
     * Get the user
     *
     * @param integer $id
     *
     * @return mixed
     */
    public function getUser($id)
    {
        return $this->user->find($id);
    }

    /**
     * Create a new user
     *
     * @param array $data
     *
     * @return User
     */
    public function create($data)
    {
        // Create a new user
        $user = $this->auth->register($data);
        //echo $user->token+'not observer';exit;
        $user->save();

        // Assign role to the user
        if (isset($data['role_id'])) {
            $this->roleRepository->assignRole($user, $data);
        }

        // Create the user details
        $this->createUserDetail($user, $data);

        return $user;
    }

    /**
     * Update user using the Eloquent model
     *
     * @param User $user
     * @param array $data
     *
     * @return User
     */
    public function updateWithEloquent($user, array $data)
    {
        $inputArray = array();
        if (isset($data['email'])) {
            $inputArray['email'] = $data['email'];
        }

        if (isset($data['password'])) {
            $inputArray['password'] = $data['password'];
        }
        $user = $this->auth->update($user, $inputArray);
        return $user;
    }

    /**
     * Update user information
     *
     * @param integer $id
     * @param \App\Http\Requests\UserRequest $request
     *
     * @return mixed
     */
    public function update($id, $request)
    {
        $user = $this->get($id);

        if (isset($request->email)) {
            $user->email = $request->email;
            $user->save();
        }

        if (isset($request->user_detail)) {
            $data = [
                'user_detail' => $request->user_detail,
            ];
            // Update the user details
            $this->updateUserDetail($user, $data);
        }

        // Assign role to the user
        if (isset($data['role_id'])) {
            $roleId = $user->roles()->first()->id;
            $previous_role = $this->auth->findRoleById($roleId);
            $previous_role->users()->detach($user);

            $this->roleRepository->assignRole($user, $data);
            $role = $this->role->find($request->user_roles['id']);
            $role->users()->attach($user);

        }

        return $user;
    }

    /**
     * Delete user
     *
     * @param integer $id
     *
     * @return mixed
     */
    public function destroy($id)
    {
        $user = $this->get($id);

        return $user->delete();
    }

    /**
     * Assign user details
     *
     * @param UserDetail $userDetail
     * @param array $data
     *
     */
    private function assignUserDetails($userDetail, $data)
    {
        if (isset($data['user_detail']['first_name'])) {
            $userDetail->first_name = $data['user_detail']['first_name'];
        }

        if (isset($data['user_detail']['last_name'])) {
            $userDetail->last_name = $data['user_detail']['last_name'];
        }

        if (isset($data['user_detail']['father_name'])) {
            $userDetail->father_name = $data['user_detail']['father_name'];
        }

        if (isset($data['user_detail']['email'])) {
            $userDetail->phone = $data['user_detail']['email'];
        }

        if (isset($data['user_detail']['phone'])) {
            $userDetail->phone = $data['user_detail']['phone'];
        }

        if (isset($data['user_detail']['gender'])) {
            $userDetail->gender = $data['user_detail']['gender'];
        }

        if (isset($data['user_detail']['profile_image'])) {
            $userDetail->profile_image = $data['user_detail']['profile_image'];
        }

        if (isset($data['user_detail']['blood_group'])) {
            $userDetail->blood_group = $data['user_detail']['blood_group'];
        }

        if (isset($data['user_detail']['identity_number'])) {
            $userDetail->identity_number = $data['user_detail']['identity_number'];
        }

        if (isset($data['user_detail']['address'])) {
            $userDetail->address = $data['user_detail']['address'];
        }

        if (isset($data['user_detail']['city'])) {
            $userDetail->city = $data['user_detail']['city'];
        }

        if (isset($data['user_detail']['state'])) {
            $userDetail->state = $data['user_detail']['state'];
        }

        if (isset($data['user_detail']['zip'])) {
            $userDetail->zip = $data['user_detail']['zip'];
        }

        if (isset($data['user_detail']['country'])) {
            $userDetail->country = $data['user_detail']['country'];
        }

        if (isset($data['user_detail']['verification_code'])) {
            $userDetail->verification_code = $data['user_detail']['verification_code'];
        }

        if (isset($data['user_detail']['dob'])) {
            $userDetail->dob = $data['user_detail']['dob'];
        }

        if (isset($data['user_detail']['level_year'])) {
            $userDetail->level_year = $data['user_detail']['level_year'];
        }

        if (isset($data['user_detail']['level_semester'])) {
            $userDetail->level_semester = $data['user_detail']['level_semester'];
        }

        if (isset($data['user_detail']['group'])) {
            $userDetail->group = $data['user_detail']['group'];
        }

        if (isset($data['user_detail']['academic_year'])) {
            $userDetail->academic_year = $data['user_detail']['academic_year'];
        }

        if (isset($data['user_detail']['skills'])) {
            if( is_array($data['user_detail']['skills']) ) {
                $data['user_detail']['skills'] = json_encode($data['user_detail']['skills']);
            }
            $userDetail->skills = $data['user_detail']['skills'];
        }

        if (isset($data['user_detail']['hobbies'])) {
            if( is_array($data['user_detail']['hobbies']) ) {
                $data['user_detail']['hobbies'] = json_encode($data['user_detail']['hobbies']);
            }
            $userDetail->hobbies = $data['user_detail']['hobbies'];
        }

        if (isset($data['user_detail']['languages'])) {
            if( is_array($data['user_detail']['languages']) ) {
                $data['user_detail']['languages'] = json_encode($data['user_detail']['languages']);
            }
            $userDetail->languages = $data['user_detail']['languages'];
        }

        if (isset($data['user_detail']['references'])) {
            if( is_array($data['user_detail']['references']) ) {
                $data['user_detail']['references'] = json_encode($data['user_detail']['references']);
            }
            $userDetail->references = $data['user_detail']['references'];
        }

    }

    /**
     * Find user by activation code
     *
     * @param string $code
     *
     * @return \App\Models\User
     */
    public function findByActivationCode($code)
    {
        $activation = $this->activation->where('code', $code)->first();

        if (@count($activation)) {
            $user = $this->get($activation->user_id);
        } else {
            throw new Exception('Code not found.');
        }

        return $user;
    }

    /**
     * Find user by email
     *
     * @param string $email
     * @param $forPartnerChecking
     *
     * @return \App\Models\User
     */
    public function findByEmail($email, $forPartnerChecking = false)
    {
        $user = $this->user->where('email', $email)->first();

        if (!@count($user) && !$forPartnerChecking) {
            throw new Exception('User not found.');
        }

        return $user;
    }

    /**
     * Find user by reminder code
     *
     * @param string $code
     *
     * @return \App\Models\User
     */
    public function findByReminderCode($code)
    {
        $reminder = Reminder::where('code', $code)->first();

        if (@count($reminder)) {
            $user = $this->get($reminder->user_id);
        } else {
            throw new Exception('Code not found.');
        }

        return $user;
    }

    /**
     * Find user detail by phone
     *
     * @param string $phone
     *
     * @return \App\Models\User
     */
    public function findUserDetailByPhone($phone)
    {
        $phone = str_replace('+91', '', $phone);

        $userDetail = UserDetail::where('phone', $phone)->first();

        return $userDetail;
    }

    /**
     * Login by given instance
     *
     * @param  User $user
     */
    public function loginByInstance($user)
    {
        $this->auth->login($user);
    }

    /**
     * Update user using the Eloquent model
     *
     * @param User $user
     * @param array $data
     *
     * @return User
     */
    public function updatePassword($user, array $data)
    {
        $user->password = bcrypt($data['password']);
        $user->save();

        return $user;
    }

    /**
     * Update the user details
     *
     * @param User $user
     */
    public function verifyPhone($user)
    {
        $user->user_status = 1;
        $user->save();

        $user->userDetail->phone_verified = 1;
        $user->userDetail->save();
    }

}
