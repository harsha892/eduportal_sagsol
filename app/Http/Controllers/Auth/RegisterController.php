<?php

namespace App\Http\Controllers\Auth;

use App\Domains\UserDomain;
use App\Http\Requests\Users\RegisterUserRequest;
use App\Http\Requests\Users\UserActivationRequest;
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
     * Register user details
     *
     * @param JWTAuth $jwtAuth
     * @param User $user
     * @param RegisterUserRequest $request
     * @param ResponseFactory $responseFactory
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function register(
        JWTAuth $jwtAuth,
        UserDomain $userDomain,
        RegisterUserRequest $request,
        ResponseFactory $responseFactory
    ) {
        $data = $userDomain->register($request->all());
        try {
            $jwtToken = $jwtAuth->fromUser($data['user']);

            return $responseFactory->json([
                'token' => $jwtToken,
                'code' => $data['code'],
            ], Response::HTTP_CREATED);
        } catch (\Exception $e) {
            Log::error(RegisterController::SIGNUP_ERROR . 'For register method : ' . $e->getMessage());

            return $responseFactory->json([
                'status_code' => 'ZCE01',
            ], Response::HTTP_BAD_REQUEST);
        }
    }

    public function activate(
        JWTAuth $jwtAuth,
        UserDomain $userDomain,
        UserActivationRequest $request,
        ResponseFactory $responseFactory
    ) {
        try {
            $user = $userDomain->activate($request->code);

            return $responseFactory->json($user, Response::HTTP_CREATED);
        } catch (\Exception $e) {
            Log::error(RegisterController::SIGNUP_ERROR . 'For activate method : ' . $e->getMessage());

            return $responseFactory->json([
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
