<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PlaygroundController;
use App\Http\Controllers\RatingController; // otetaan RatingController käyttöön
use App\Http\Controllers\EquipmentController;
use App\Http\Controllers\HomeController;
use App\Models\User; // paginointia varten

// Route::middleware(['auth'])->group(function () {  // tällä reitit vaativat sisäänkirjautumisen
    Route::group([], function () { // tällä sisäänkirjautumista ei vaadita

    // Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home'); // tähän playground index
    Route::get('/', [App\Http\Controllers\PlaygroundController::class, 'index'])->name('home'); // tähän playground index

    Route::controller(PlaygroundController::class)->prefix('playgrounds')->group(function () {
        Route::get('/', 'index');
        Route::get('/create', 'create')->middleware('auth'); // ->middleware('auth') eli vaatii sisäänkirjautumisen
        Route::get('/{id}', 'show');
        Route::post('/', 'store')->middleware('auth');
        Route::post('/{id}', 'edit')->middleware('auth');
        Route::put('/{id}', 'update')->middleware('auth'); // PUT metodille oma reititys
        Route::delete('/{id}', 'destroy')->middleware('auth'); // https://laravel.com/docs/10.x/routing#form-method-spoofing
    });                         // destroy :ta käytetään deleten sijaan

    Route::post('/rating', '\App\Http\Controllers\RatingController@store'); // vaati tarkan osoitteen toimiakseen, reititys arviointijen tallentamista varten

    Route::post('/equipments', '\App\Http\Controllers\EquipmentController@store')->middleware('auth'); // laitteiden lisäystä varten reititys, vaati tarkan osoitteen toimiakseen
    Route::get('/playgrounds/create', [EquipmentController::class, 'show'])->middleware('auth'); // reititys laitteiden näyttämistä leikkikentän luonti formin yhteydessä

    Route::get('/admin', [HomeController::class, 'login']);

    Route::get('/users', function () { // pagination reitti
        return User::paginate();
    });

});

// Route::get('/', function () { 
//     return view('welcome');
// });

Auth::routes();