<?php

namespace App\Http\Controllers;

use Activation;
use App\Domains\UserDomain;
use App\Http\Requests\UserLoginRequest;
use App\Http\Requests\UserPostRequest;
use App\Http\Requests\Users\RegisterUserRequest;
use App\Http\Requests\VerifyUserRequest;
use App\Mail\ActiveUser;
use App\Models\Contact;
use App\Models\RoleUser;
use App\Models\User;
use App\Models\VerifyUser;
use App\Repositories\UserRepository;
use Cartalyst\Sentinel\Native\Facades\Sentinel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Symfony\Component\HttpKernel\Exception\AccessDeniedHttpException;

class UserController extends Controller
{

    private $userDomain;

    public function __construct(
        UserDomain $userDomain
    ) {
        $this->userDomain = $userDomain;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(
        UserRepository $userRepository,
        Request $request
    ) {
        $users = $userRepository->getAll($request->all());
        return response()->json($users);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(
        UserDomain $userDomain,
        RegisterUserRequest $request
    ) {

        $currentUser = $userDomain->getCurrentUser();
        if (!$currentUser->canCreateUser()) {
            throw new AccessDeniedHttpException();
        }
        $data = $userDomain->register($request->all());
        return response()->json([
            'user' => $data['user'],
            'code' => $data['code'],
        ]);
    }

    /**
     * Get current logged user profile
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function profile(
        UserDomain $userDomain
    ) {
        $user = $userDomain->getCurrentUser();
        return response()->json($user);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $currentUser = $this->userDomain->getCurrentUser();
        if (!$currentUser->canCreateUser()) {
            throw new AccessDeniedHttpException();
        }

        $user = $this->userDomain->get($id);
        if (!$user) {
            abort(404);
        }
        return response()->json($user);

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id
    ) {
        return response()->json($this->userDomain->update($id, $request));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

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
