<?php

namespace App\Http\Controllers;

use DB;
use Illuminate\Http\Request;
use App\Transformers\RoleTransformer; 
use Dingo\Api\Routing\Helpers;
use Cartalyst\Sentinel\Native\Facades\Sentinel;
use App\models\Role;
use App\models\RoleUser;
use App\Http\Requests\NewRoleRequest;
use App\Http\Requests\UpdateRoleRequest;
use App\Http\Requests\UsersRoleRequest;
use App\Http\Requests\UserUpdateRoleRequest;

class UserRolesController extends Controller
{
    //
    public function CreateNewRole(NewRoleRequest $request){
        $role = new Role();
        $role->slug = $request->get("slug");
        $role->name = $request->get("name");
        $role->permissions = $request->get("permissions");
        $role->save(); 
        return $role;
    }
    public function updateRole(UpdateRoleRequest $request){
        $role = Sentinel::findRoleById($request->get("id"));
        $role->slug = $request->get("slug");
        $role->name = $request->get("name");
        $role->permissions = $request->get("permissions");
        $role->save();
        return $role;
    }
    public function getAllRoles(){
        $roles = Role::all();
        return $roles;
    }
    public function deleteRole(Request $request){
        $role = Role::find($request->get("id"));
        $role->delete();
        return "Role Deleted Successful";
    }
    
    public function updateUserRole(UserUpdateRoleRequest $request){
        $userRoles = RoleUser::where([ 'user_id' => $request->get("user_id")])->first();
        $userRoles->role_id = $request->get("role_id");
        // return $userRoles;
        $userRoles->update();
        return $userRoles;
    }
}
