<?php
namespace App\Support\Traits;

use App\Models\User;
use App\Models\Utilisateur;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Auth;

trait Authenticatable
{
    public function responseWithToken(string $access_token, Utilisateur $user = null)
    {
        return new JsonResponse([
            'user'          => $user ?: auth()->user(),
            'authorization' => [
                'access_token' => $access_token,
                'token_type'   => 'bearer',
                'expires_in' => Auth::factory()->getTTL() * 60,
            ],
        ]);
    }
}
