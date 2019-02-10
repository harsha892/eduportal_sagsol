<?php

namespace App\Repositories;

use Cartalyst\Sentinel\Sentinel as Auth;
use Illuminate\Support\Facades\DB;

class RoleRepository {

    private $auth;
    private $role;

    public function __construct(Auth $auth) {
        $this->auth = $auth;
        $this->role = $auth->getRoleRepository()->createModel();
    }

    

}