<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\PlaygroundController;

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

    Route::get('/vue-playgrounds', [PlaygroundController::class, 'getPlaygrounds']);
    Route::get('/vue-playgrounds/{playgroundId}', [PlaygroundController::class, 'fetchPlayground']);
    Route::put('/vue-playgrounds/{playgroundId}', [PlaygroundController::class, 'updatePlayground']);
    Route::delete('/vue-playgrounds/delete/{playgroundId}', [PlaygroundController::class, 'destroyPlayground']);

    
    // Route::controller(PlaygroundController::class)->prefix('playgrounds')->group(function () {
    //     Route::get('/vue-playgrounds', 'getPlaygrounds');
    //     Route::get('/vue-playgrounds/{playgroundId}', 'fetchPlayground');
    //     Route::put('/vue-playgrounds/{playgroundId}', 'updatePlayground');
    //     Route::delete('/vue-playgrounds/delete/{playgroundId}', 'destroyPlayground');
    // });

});

// Route::get('/vue-playgrounds', [PlaygroundController::class, 'getPlaygrounds'])->middleware('auth');

// Route::get('/vue-playgrounds/{playgroundId}', '\App\Http\Controllers\PlaygroundController@fetchPlayground');
// Route::get('/vue-playgrounds/{playgroundId}', [PlaygroundController::class, 'fetchPlayground'])->middleware('auth');

// Route::put('/vue-playgrounds/{playgroundId}', '\App\Http\Controllers\PlaygroundController@updatePlayground');
// Route::put('/vue-playgrounds/{playgroundId}', [PlaygroundController::class, 'updatePlayground'])->middleware('auth');

