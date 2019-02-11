<?php

namespace App\Http\Controllers\Auth;

use App\Domains\UserDomain;
use App\Http\Requests\Users\LoginRequest;
use Illuminate\Contracts\Routing\ResponseFactory;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Log;

class LoginController extends Controller
{

    const LOGIN_ERROR = '*** LOGIN_ERROR in LoginController *** : ';
    /**
     *  User login
     *
     * @param LoginRequest $request
     * @param UserDomain $userDomain,
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function login(
        LoginRequest $request,
        UserDomain $userDomain,
        ResponseFactory $responseFactory
    ) {
        $credentials = $request->only(['email', 'password']);
        $loginDetails = $userDomain->performLogin($credentials);
        return $responseFactory->json($loginDetails, Response::HTTP_OK);

    }

    /**
     * Login using token
     *
     * @param string $token
     * @param Login $login
     * @param ResponseFactory $responseFactory
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function loginUsingToken($token, Login $login, ResponseFactory $responseFactory)
    {
        if (!$token) {
            return $responseFactory->json([
                'status_code' => 'ZCE31',
            ], Response::HTTP_UNPROCESSABLE_ENTITY);
        }

        try {
            $jwtToken = $login->loginUsingToken($token);

            return response()->json([
                'token' => $jwtToken,
            ], Response::HTTP_OK);
        } catch (\Exception $e) {
            Log::error(LoginController::LOGIN_ERROR . 'For loginUsingToken method : ' . $e->getMessage());
            return $responseFactory->json([
                'status_code' => 'ZCE31',
            ], Response::HTTP_FORBIDDEN);
        }
    }
}
