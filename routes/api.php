<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\Auth\LoginController;

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

Route::middleware(['auth:sanctum'])->group(function () {  // tällä reitit vaativat sisäänkirjautumisen
    Route::controller(UserController::class)->prefix('users')->group(function () {
        Route::get('/', 'getUsers');
        Route::get('/current', 'getCurrentUser');
        Route::get('/{id}', 'getUser');
        Route::post('/', 'postUser');
        Route::post('/{id}/change-password', 'changePassword');
    });

    Route::post('/logout', [LoginController::class, 'logout']);
});
