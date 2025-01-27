<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\API\LoginRequest;
use App\Http\Requests\API\RegisterUserRequest;
use App\Services\AuthService;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AuthController extends Controller
{
    public function __construct(private AuthService $authRepo) {}
    public function register(RegisterUserRequest $request)
    {
        try {
            DB::beginTransaction();

            $createdUser = $this->authRepo->registerNewUser($request);


            DB::commit();
            return $this->sendResponse($createdUser, 'User registered successfully!', 201);
        } catch (Exception $e) {
            DB::rollBack();
            return $this->sendError($e->getMessage(), 'Something went wrong!', 500);
        }
    }

    public function login(LoginRequest $request)
    {
        try {
            $user = $this->authRepo->loginUser($request);
            return $this->sendResponse($user, 'User logged in successfully!', 200);
        } catch (Exception $e) {
            return $this->sendError($e->getMessage(), 'Invalid credentials!', 401);
        }
    }
}
