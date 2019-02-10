<?php

namespace App\Http\Controllers;

use Activation;
use App\Http\Requests\UserLoginRequest;
use App\Http\Requests\UserPostRequest;
use App\Http\Requests\VerifyUserRequest;
use App\Mail\ActiveUser;
use App\models\Contact;
use App\models\RoleUser;
use App\models\User;
use App\models\VerifyUser;
use Cartalyst\Sentinel\Native\Facades\Sentinel;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class UserController extends Controller
{
    //

    public function showUser()
    {
        return response()->json(["Hello"]);
    }
    public function createNewUser(UserPostRequest $request)
    {

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

        $verifiUser = User::find($user->id);
        $user->activationCode = $activationCreate->code;
        Mail::to($user->email)->send(new ActiveUser($verifiUser, $activationCreate->code));

        return User::with(['contact'])->find($user->id);
    }
    public function __construct()
    {
        $this->middleware('auth:api', ['except' => ['doLogin']]);
    }
    public function doLogin(UserLoginRequest $request)
    {
        $credentials = [
            'email' => $request->get("email"),
            'password' => $request->get("password"),
        ];
        // dd(auth);
        // $loginedUser = Sentinel::authenticate($credentials);
        // $user = User::find($loginedUser->id);
        // //$loginedUser->role_id = RoleUser::where("user_id", $loginedUser->id)->get()[0]->role_id;
        // return $user;
        //    $credentials = [$request->get("email"), $request->get("password")];

        if (!$token = Auth::attempt($credentials)) {
            return response()->json(['error' => 'Unauthorized'], 401);
        }

        return $this->respondWithToken($token);

    }
    public function verifyUser(VerifyUserRequest $request)
    {
        $user = Sentinel::findById($request->get("user_id")); // User
        if (!$user) {
            return "user not found";
        }

        $isVerifyCompleted = Activation::completed($user);
        // User ALready verified
        if ($isVerifyCompleted) {
            return "User already verified";
        }
        $isActionComplete = Activation::complete($user, $request->get("activationCode"));
        if ($isActionComplete) {
            return "Success";
        }

        return "invalid code";
    }/**
     * Get the authenticated User.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function me()
    {
        return response()->json(auth()->user());
    }

    /**
     * Log the user out (Invalidate the token).
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function logout()
    {
        auth()->logout();

        return response()->json(['message' => 'Successfully logged out']);
    }

    /**
     * Refresh a token.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function refresh()
    {
        return $this->respondWithToken(auth()->refresh());
    }

    /**
     * Get the token array structure.
     *
     * @param  string $token
     *
     * @return \Illuminate\Http\JsonResponse
     */
    protected function respondWithToken($token)
    {
        return response()->json([
            'access_token' => $token,
            'token_type' => 'bearer',
            'expires_in' => auth()->factory()->getTTL() * 60,
        ]);
    }
}
