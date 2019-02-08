<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\UserPostRequest;
use App\Http\Requests\VerifyUserRequest;
use App\Http\Requests\UserLoginRequest;
use App\Http\Requests\UsersRoleRequest;

use Cartalyst\Sentinel\Native\Facades\Sentinel;
use Illuminate\Support\Facades\Mail;
use Activation;

use App\models\User;
use App\models\Contact;
use App\models\RoleUser;
use App\models\VerifyUser;

use App\Mail\ActiveUser;


class UserController extends Controller
{
    //

    public function showUser() {
        return response()->json(["Hello"]);
    }
    public function createNewUser(UserPostRequest $request){

         $user = Sentinel::register(
             [
                'role_id' => $request->get("role_id"),
                'first_name' => $request->get("first_name"),
                'last_name' => $request->get("last_name"),
                'email' => $request->get("email"),
                'password' => $request->get("password"),
                'last_logined' => $request->get("last_logined"),
                'login_status' => $request->get("login_status"),
                'academic_year_start' => $request->get("academic_year_start"),
                'academic_year_end' => $request->get("academic_year_end"),
             ]
         );

        $contact = new Contact();
        $contact->user_id = $user->id;
        $contact->country_code = $request->get("country_code");
        $contact->personal_phone = $request->get("personal_phone");
        $contact->emergency_phone = $request->get("emergency_phone");
        $contact->city = $request->get("city");
        $contact->state = $request->get("state");
        $contact->zipcode = $request->get("zipcode");
        $contact->full_address = $request->get("full_address");
        $contact->save();

        $user->contact_id = $contact->id;
        $user->save();

        $role = new RoleUser();
        $role->user_id = $user->id;
        $role->role_id = $request->get("role_id");
        $role->save();

        $activationCreate = Activation::create($user);
         
        $verifiUser =  User::find( $user->id );
        $user->activationCode = $activationCreate->code;
        Mail::to($user->email)->send(new ActiveUser($verifiUser, $activationCreate->code));

        return User::with(['contact'])->find( $user->id );
    }
    public function doLogin(UserLoginRequest $request) {
        $credentials = [
            'email'    => $request->get("email"),
            'password' => $request->get("password")
        ];
        $loginedUser = Sentinel::authenticate($credentials);
        return $loginedUser;
    }
    public function verifyUser(VerifyUserRequest $request){
        $user = Sentinel::findById($request->get("user_id")); // User 
        if(!$user) {
            return "user not found";
        }
        
        $isVerifyCompleted = Activation::completed($user);
        // User ALready verified
        if($isVerifyCompleted) {
            return "User already verified";
        } 
        $isActionComplete = Activation::complete($user, $request->get("activationCode"));
            if($isActionComplete) {
                return "Success";
            }
    
        return "invalid code";
    }
}
