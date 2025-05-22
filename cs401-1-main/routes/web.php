<?php

use App\Http\Controllers\GameController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});
Route::get('/get-csrf-token', function () {
    return response()->json(['_token' => csrf_token()]);
});
//Route::resource('games', GameController::class);    //to create all
Route::get('/games', [GameController::class, 'index'])->name('games.index');
Route::get('/games/create', [GameController::class, 'create'])->name('games.create');
Route::post('/games', [GameController::class, 'store'])->name('games.store');
Route::get('/games/{id}', [GameController::class, 'show'])->name('games.show');
Route::get('/games/{id}/edit', [GameController::class, 'edit'])->name('games.edit');
Route::put('/games/{id}', [GameController::class, 'update'])->name('games.update');
Route::delete('/games/{id}', [GameController::class, 'destroy'])->name('games.destroy');

//Verb	        URI	                Action	Route Name
// GET	        /games	            index	games.index
// GET	        /games/create	    create	games.create
// POST	        /games	            store	games.store
// GET	        /games/{game}	    show	games.show
// GET	        /games/{game}/edit	edit	games.edit
// PUT/PATCH	/games/{game}	    update	games.update
// DELETE	    /games/{game}	    destroy	games.destroy