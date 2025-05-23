<?php

use App\Http\Controllers\GamesController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
})->name('home');

Route::get('/get-csrf-token', function () {
    return response()->json(['_token' => csrf_token()]);
});

Route::get('/games', [GamesController::class, 'index'])->name('games.index');
Route::get('/games/{id}', [GamesController::class, 'show'])->name('games.show');
Route::delete('/games/{id}', [GamesController::class, 'destroy'])->name('games.destroy');
Route::get('/games/silent-hill-2', [GamesController::class, 'showSilentHill2'])->name('games.silent-hill-2');