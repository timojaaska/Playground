<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\VueController;
use App\Http\Controllers\PlaygroundController;
use App\Http\Controllers\RatingController; // otetaan RatingController käyttöön
use App\Http\Controllers\EquipmentController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\FeedbackController;
use App\Models\User; // paginointia varten

// Route::middleware(['auth'])->group(function () {  // tällä reitit vaativat sisäänkirjautumisen
Route::group([], function () { // tällä sisäänkirjautumista ei vaadita

    // Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home'); // tähän playground index
    Route::get('/', [App\Http\Controllers\PlaygroundController::class, 'index'])->name('home'); // tähän playground index

    Route::controller(PlaygroundController::class)->prefix('playgrounds')->group(function () {
        Route::get('/', 'index');
        Route::get('/create', 'showForm')->middleware('auth')->name('playground.createForm'); // ->middleware('auth') eli vaatii sisäänkirjautumisen
        Route::get('/{id}', 'show');
        Route::get('/{id}/edit', 'showForm')->name('playground.editForm');
        Route::post('/', 'store')->middleware('auth')->name('playground.store');
        // Route::post('/{id}', 'edit')->middleware('auth');
        // Route::post('/{id}', 'edit')->middleware('auth');
        Route::put('/{id}/update', 'update')->middleware('auth')->name('playground.update'); // PUT metodille oma reititys
        // Route::put('/playgrounds/{id}', 'update')->middleware('auth'); // PUT metodille oma reititys
        Route::delete('/{id}', 'destroy')->middleware('auth'); // https://laravel.com/docs/10.x/routing#form-method-spoofing
    });
                           // destroy :ta käytetään deleten sijaan
    // Route::put('/{id}/update', '\App\Http\Controllers\PlaygroundController@update');
    // Route::put('/update/{id}', '\App\Http\Controllers\PlaygroundController@update')->middleware('auth'); // tällä korjaantu reititys ongelma
    // Route::post('/playgrounds/{id}', '\App\Http\Controllers\PlaygroundController@edit')->middleware('auth'); // tällä korjaantu reititys ongelma

    Route::post('/rating', '\App\Http\Controllers\RatingController@store'); // vaati tarkan osoitteen toimiakseen, reititys arviointijen tallentamista varten

    Route::post('/equipments', '\App\Http\Controllers\EquipmentController@store')->middleware('auth'); // laitteiden lisäystä varten reititys, vaati tarkan osoitteen toimiakseen
    // Route::get('/playgrounds/create', [EquipmentController::class, 'show'])->middleware('auth'); // reititys laitteiden näyttämistä leikkikentän luonti formin yhteydessä

    Route::get('/admin', [HomeController::class, 'login']);

    Route::get('/feedback', [FeedbackController::class, 'index']); // palaute linkki
    Route::post('/mail', [FeedbackController::class, 'mail']);

    /*Route::get('/users', function () { // pagination reitti
        return User::paginate();
    });*/

});

// Route::get('/', function () {
//     return view('welcome');
// });

Auth::routes();

Route::get('/{vue_capture?}', [VueController::class, 'vueApp'])->where('vue_capture', '^(?!oauth|api).*$');