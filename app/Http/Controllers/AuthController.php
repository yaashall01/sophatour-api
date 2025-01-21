<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use App\Http\Requests\RegisterRequest;
use App\Services\AuthService;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;
use Illuminate\Support\Facades\Log;


class AuthController extends Controller
{
    protected $authService;

    public function __construct(AuthService $authService)
    {
        $this->authService = $authService;
        $this->middleware('auth:api', ['except'=> ['login', 'register']]);
    }

    /**
     * Register a new user.
     *
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function register(RegisterRequest $request)
    {
        try {
            $response = $this->authService->register($request->validated());

            return response()->json([
                'message' => 'User registered successfully',
                'data' => $response,
            ], 201);
        } catch (\Exception $e) {
            return response()->json([
                'error' => $e->getMessage(),
            ], 500);
        }
    }

    /**
     * Handle login requests.
     *
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function login(LoginRequest $request)
    {
        Log::info('Fetching User with identifier:', ['request' => $request->all()]);

        $credentials = $request->only('identifiant', 'mot_de_passe');

        $token = $this->authService->login($credentials['identifiant'], $credentials['mot_de_passe']);

        if (!$token) {
            Log::warning('Unauthorized login attempt', ['identifiant' => $credentials['identifiant']]);
            return response()->json(['error' => 'Unauthorized'], 401);
        }

        return response()->json($this->authService->respondWithToken($token));
    }


    public function me()
    {
        try {
            $user = $this->authService->me();
            return response()->json($user);
        } catch (\Exception $e) {
            Log::error('Error fetching user', ['error' => $e->getMessage()]);
            return response()->json(['error' => 'Internal Server Error'], 500);
        }
    }

    public function logout()
    {
        try {
            $this->authService->logout();
            return response()->json(['message' => 'Successfully logged out']);
        } catch (\Exception $e) {
            Log::error('Error during logout', ['error' => $e->getMessage()]);
            return response()->json(['error' => 'Internal Server Error'], 500);
        }
    }

    public function refresh()
    {
        try {
            $token = $this->authService->refresh();
            return response()->json($this->authService->respondWithToken($token));
        } catch (\Exception $e) {
            Log::error('Error during token refresh', ['error' => $e->getMessage()]);
            return response()->json(['error' => 'Internal Server Error'], 500);
        }
    }

}