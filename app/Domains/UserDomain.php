<?php
namespace App\Domains;

use App\Events\PasswordResetCompleted;
use App\Events\ReminderCodeGenerated;
use App\Events\UserActivated;
use App\Repositories\RoleRepository;
use App\Repositories\UserRepository;
use Cartalyst\Sentinel\Activations\IlluminateActivationRepository as Activation;
use Cartalyst\Sentinel\Sentinel as Auth;
use Illuminate\Events\Dispatcher as Event;
use Log;
use Reminder;
use Symfony\Component\HttpKernel\Exception\AccessDeniedHttpException;
use Symfony\Component\HttpKernel\Exception\HttpException;
use Tymon\JWTAuth\Exceptions\JWTException;
use Tymon\JWTAuth\JWTAuth;

class UserDomain
{
    const USER_ERROR = '*** USER_ERROR in User Domain *** : ';
    /**
     * Auth Instance
     *
     * @var Auth
     */
    private $auth;
    private $jwtAuth;

    /**
     * Event instance
     *
     * @var Event
     */
    private $event;

    /**
     * Activation instance
     *
     * @var Activation
     */
    private $activation;

    /**
     * UserRepository instance
     *
     * @var UserRepository
     */
    private $userRepository;

    /**
     * RoleRepository instance
     *
     * @var RoleRepository
     */
    private $roleRepository;

    /**
     * User constructor.
     *
     * @param Auth $auth
     * @param Event $event
     * @param Reminder $reminder
     * @param Activation $activation
     * @param UserRepository $userRepository
     * @param RoleRepository $roleRepository
     */
    public function __construct(
        Auth $auth,
        JWTAuth $jwtAuth,
        Event $event,
        Activation $activation,
        UserRepository $userRepository,
        RoleRepository $roleRepository
    ) {
        $this->event = $event;
        $this->auth = $auth;
        $this->jwtAuth = $jwtAuth;
        $this->activation = $activation;
        $this->userRepository = $userRepository;
        $this->roleRepository = $roleRepository;
    }

    /**
     * Get all roles
     *
     * @return array
     */
    public function getAllRoles()
    {
        $role = [];
        foreach ($this->roleRepository->getAllRoles() as $role_details) {
            if (!in_array($role_details->id, [2, 3, 4])) {
                $role[$role_details->id] = $role_details->name;
            }
        }

        return $role;
    }

    /**
     * Get the user
     *
     * @param $id
     *
     * @return mixed
     */
    public function get($id)
    {
        return $this->userRepository->get($id);
    }

    /**
     * Register user details
     *
     * @param array $data
     *
     * @return User
     *
     * @throws \Exception
     */
    public function register($data)
    {
        try {
            $user = $this->create($data);
            // Generate activation code
            $code = $this->activation->create($user);

        } catch (\Exception $e) {
            Log::error(UserDomain::USER_ERROR . 'For registerUser method : ' . $e->getMessage());
            throw new \Exception('Error occurred while user registration. ' . $e->getMessage());
        }

        return ['user' => $user, 'code' => $code->code];
    }

    /**
     * Login user
     *
     * @param array $credentials
     *
     * @return string
     */
    public function performLogin($credentials)
    {

        try {
            $token = $this->jwtAuth->attempt($credentials);

            if (!$token) {
                throw new AccessDeniedHttpException();
            }
            $user = $this->jwtAuth->user();
            $user->userDetail;
            $roleSlug = $user->roles->first()->slug;

        } catch (JWTException $e) {
            Log::error(UserDomain::USER_ERROR . 'For perform method : ' . $e->getMessage());
            throw new HttpException(500);
        }

        return [
            'token' => $token,
            'user' => $user,
            'role' => $roleSlug,
        ];
    }

    /**
     * Create a new user
     *
     * @param array $data
     *
     * @return static
     */
    public function create($data)
    {
        return $this->userRepository->create($data);
    }

    /**
     * Update user informaiton
     *
     * @param integer $id
     * @param \App\Http\Requests\UserRequest $request
     */
    public function update($id, $request)
    {
        $this->userRepository->update($id, $request);
    }

    /**
     * Delete user
     *
     * @param integer $id
     */
    public function destroy($id)
    {
        $this->userRepository->destroy($id);
    }

    /**
     * Activate the user account
     *
     * @param string $code
     *
     */
    public function activate($code)
    {
        $user = $this->userRepository->findByActivationCode($code);

        $this->activation->complete($user, $code);

        // $this->event->fire(new UserActivated($user));

        return $user;
    }

    /**
     * Activate the user account
     *
     * @param \App\Models\User $user
     * @param string $code
     *
     */
    public function shortActivate($user, $code)
    {
        $this->activation->complete($user, $code);

        $this->event->fire(new UserActivated($user));
    }

    /**
     * Activate the user account and log the user in
     *
     * @param string $code
     *
     */
    public function shortActivateAndLogin($code)
    {
        $user = $this->userRepository->findByActivationCode($code);

        $this->shortActivate($user, $code);

        $this->userRepository->loginByInstance($user);
    }

    /**
     * Send password recovery email
     *
     * @param string $email
     *
     */
    public function sendPasswordRecoveryEmail($email)
    {
        $user = $this->userRepository->findByEmail($email);

        // Remove all expired reminders
        Reminder::removeExpired();

        // Check if a previous reminder record exists for the user.
        if (Reminder::exists($user)) {
            foreach ($user->reminders as $reminder) {
                $reminder->delete();
            }
        }

        $reminder = Reminder::create($user);

        $this->event->fire(new ReminderCodeGenerated($user, $reminder));
    }

    /**
     * Reset the user password
     *
     * @param string $code
     * @param object $request
     *
     */
    public function reset($code, $request)
    {
        $user = $this->userRepository->findByReminderCode($code);
        Reminder::complete($user, $code, $request->password);

        $this->event->fire(new PasswordResetCompleted($user));
    }

    /**
     * Get current user details
     *
     * @return mixed
     */
    public function getCurrentUser()
    {
        $id = $this->auth->getUser()->id;
        return $this->get($id);
    }

    /**
     * Send verification code
     *
     * @param $user
     *
     * @return mixed
     */
    public function sendResetPasswordCode($user)
    {
        try {

            $verificationCode = $this->userRepository->sendVerificationCode($user);

            // $this->event->fire(new SendVerificationCodeMessageEvent($user, $verificationCode));

            return response()->json([
                'status' => 'success',
                'message' => 'Successfully sent verification code to your mobile.',
                'status_code' => 201,
            ], 201);

        } catch (\Exception $e) {
            Log::error(UserDomain::USER_ERROR . 'For sendResetPasswordCode method : ' . $e->getMessage());
            return response()->json([
                'status' => 'error',
                'message' => $e->getMessage(),
                'status_code' => 400,
            ], 201);
        }

        return $user;
    }

    /**
     * Verify user phone number
     *
     * @param $user
     * @param array  $data
     *
     * @return mixed
     */
    public function verifyResetPasswordCode($user, array $data)
    {
        if ($user->userDetail->verification_code === $data['code']) {
            return true;
        }

        return false;
    }

}
