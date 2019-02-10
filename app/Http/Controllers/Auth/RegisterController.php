<?php

namespace App\Http\Controllers\Auth;

use App\Domains\UserDomain;
use App\Http\Requests\RegisterUserRequest;
use App\Repositories\UserRepository;
use Illuminate\Contracts\Routing\ResponseFactory;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Log;
use Tymon\JWTAuth\JWTAuth;

class RegisterController extends Controller
{
    const SIGNUP_ERROR = '*** SIGNUP_ERROR in RegisterController *** : ';

    /**
     * Register renter details
     *
     * @param JWTAuth $jwtAuth
     * @param Renter $renter
     * @param RegisterUserRequest $request
     * @param ResponseFactory $responseFactory
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function register(JWTAuth $jwtAuth, UserDomain $userDomain, RegisterUserRequest $request, ResponseFactory $responseFactory)
    {
        $user = $userDomain->registerRenter($request->all());
        try {
            $jwtToken = $jwtAuth->fromUser($user);

            return $responseFactory->json([
                'token' => $jwtToken,
            ], Response::HTTP_CREATED);
        } catch (\Exception $e) {
            Log::error(RegisterController::SIGNUP_ERROR . 'For registerRenterDetail method : ' . $e->getMessage());

            return $responseFactory->json([
                'status_code' => 'ZCE01',
            ], Response::HTTP_BAD_REQUEST);
        }
    }

    /**
     * Recovery email
     *
     * @param EmailRecoveryRequest $request
     * @param UserRepository $repository
     * @param ResponseFactory $responseFactory
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function emailRecovery(EmailRecoveryRequest $request, UserRepository $repository, ResponseFactory $responseFactory)
    {
        try {
            if ($user = $repository->emailRecovery($request->except('_token'))) {
                return $responseFactory->json($user->email, Response::HTTP_OK);
            } else {
                return $responseFactory->json([
                    'status_code' => 'ZCE32',
                ], Response::HTTP_FORBIDDEN);
            }
        } catch (\Exception $e) {
            Log::error(RegisterController::SIGNUP_ERROR . 'For emailRecovery method : ' . $e->getMessage());

            return $responseFactory->json([
                'status_code' => 'ZCE32',
            ], Response::HTTP_FORBIDDEN);
        }
    }
}
