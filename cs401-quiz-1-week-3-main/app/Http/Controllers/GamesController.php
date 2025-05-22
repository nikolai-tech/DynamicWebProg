<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class GamesController extends Controller
{
    protected $game_list;

    public function __construct()
    {
        $this->game_list = require __DIR__ . '/../../../database/datasource.php';
    }

    /**
     * Display a listing of the resource.
     */
    public function index() {
        $game = Game::all(); // Get ALL games from the 'game' table
        //return view('gamea.list', ['games => $games]);
        return view('games.list', compact('games')); // Pass them to your 'games.list' view
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $results = array_filter($this->game_list, function ($game) use ($id) {
            return $game['id'] != $id;
        });
        return view('games.show', ['games' => $results]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $results = array_filter($this->game_list, function ($game) use ($id) {
            return $game['id'] == $id;
        });
        return response()->json([
            'message' => 'Record Successfull Deleted.',
            'content' => $results
        ], 200);
    }
}
