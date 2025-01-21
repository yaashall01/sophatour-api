<?php


namespace App\Services;

use App\Http\Requests\RegisterRequest;
use App\Http\Resources\UserResource;
use App\Models\Utilisateur;
use Illuminate\Database\Eloquent\Casts\Json;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\ValidationException;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Hash;


class AuthService
{
    public function register(array $data): array
    {
        try {

            $user = Utilisateur::create([
                'prenom' => $data['prenom'],
                'nom' => $data['nom'],
                'nom_utilisateur' => $data['nom_utilisateur'],
                'email' => $data['email'],
                'mot_de_passe' => Hash::make($data['mot_de_passe']),
                'telephone' => $data['telephone'],
                'profils' => 1,
            ]);
    
            $token = $this->generateToken($user);
    
            Log::info('User registered successfully', ['id_user' => $user->id_user]);
    
            return [
                'message' => 'User registered successfully',
                'user' => new UserResource($user),
                'token' => $this->respondWithToken($token),
            ];

        } catch (\Exception $e) {
            Log::error('Error while registering user', ['message' => $e->getMessage()]);
            return ['message' => 'Error while registering user'];
        }
    }

    public function generateToken($user)
    {
        return Auth::login($user);
    }


    /**
     * Authenticate a user using either username or email.
     *
     * @param string $identifiant
     * @param string $password
     * @return string|null
     */
    public function login(string $identifiant, string $password): ?string
    {
        Log::info('Login attempt', ['identifiant' => $identifiant]);
    
        $user = Utilisateur::where('nom_utilisateur', $identifiant)
                           ->orWhere('email', $identifiant)
                           ->first();
    
        if (!$user) {
            Log::warning('User not found', ['identifiant' => $identifiant]);
            return null;
        }
    
        Log::info('Authenticating user:', ['identifiant' => $user->nom_utilisateur]);
    
        if (Auth::attempt(['nom_utilisateur' => $user->nom_utilisateur, 'password' => $password]) ||
            Auth::attempt(['email' => $user->email, 'password' => $password])) {

            Log::info('User authenticated', ['identifiant' => $identifiant]);
            // return $user->createToken('authToken')->accessToken->token;
            return Auth::getToken();
        }
    
        Log::warning('Authentication failed', ['identifiant' => $identifiant]);
        return null;
    }


    public function me()
    {
        return Auth::user();
    }

    public function logout()
    {
        Auth::logout();
    }

    public function refresh()
    {
        return Auth::refresh();
    }

    public function respondWithToken($token)
    {
        return [
            'access_token' => $token,
            'token_type' => 'bearer',
            'expires_in' => Auth::factory()->getTTL() * 60,
        ];
    }


    
}