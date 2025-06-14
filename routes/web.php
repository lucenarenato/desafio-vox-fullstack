<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\CardController;


Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::group(['middleware' => ['auth']], function() {
    Route::resource('roles', RoleController::class);
    Route::resource('users', UserController::class);

});

Route::get('/cards', [CardController::class, 'index'])->name('cards.index');
Route::post('/cards', [CardController::class, 'storeCard'])->name('cards.store');
Route::put('/cards/{id}', [CardController::class, 'updateCard'])->name('cards.update');
Route::delete('/cards/{id}', [CardController::class, 'archiveCard'])->name('cards.archive');
Route::get('/labels', [CardController::class, 'getLabels']);
