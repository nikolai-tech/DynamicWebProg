<?php

use App\Http\Controllers\GamesController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});
Route::get('/get-csrf-token', function () {
    return response()->json(['_token' => csrf_token()]);
});
Route::get('/', [GamesController::class,])->name('.index');
// make the routes for the rest of the actions
Route::get('/games', [GameController::class, 'index'])->name('games.index');
Route::get('/games/{id}', [GameController::class, 'show'])->name('games.show');
Route::delete('/games/{id}', [GameController::class, 'destroy'])->name('games.destroy');