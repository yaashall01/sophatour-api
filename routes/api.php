<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\UtilisateurController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::group([

    'middleware' => 'api',
    'prefix' => 'auth'

], function ($router) {

    Route::post('login', [AuthController::class, 'login']);
    Route::post('register', [AuthController::class, 'register']);
    Route::post('logout', [AuthController::class, 'logout']);
    Route::post('refresh', [AuthController::class, 'refresh']);
    Route::post('me', [AuthController::class, 'me']);

});

Route::middleware('auth:api')->group(function () {
    Route::get('utilisateurs', [UtilisateurController::class, 'index']);
    Route::get('utilisateurs/{id}', [UtilisateurController::class, 'show']);
    Route::post('utilisateurs', [UtilisateurController::class, 'store'])->middleware('role:Administrateur system');
    Route::put('utilisateurs/{id}', [UtilisateurController::class, 'update'])->middleware('role:Administrateur system'); 
    Route::delete('utilisateurs/{id}', [UtilisateurController::class, 'destroy'])->middleware('role:Administrateur system');
});
