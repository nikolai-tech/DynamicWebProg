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
    public function index()
    {
        $games = $this->game_list; // Use the game_list array from datasource.php
        return view('games.index', compact('games')); // Pass to games.index view
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $results = array_filter($this->game_list, function ($game) use ($id) {
            return $game['id'] == $id;
        });
        $game = reset($results); // Get the first matching game
        if (!$game) {
            abort(404, 'Game not found');
        }
        return view('games.show', compact('game'));
    }

    /**
     * Display the game with ID 4 (Silent Hill 2).
     */
    public function showSilentHill2()
    {
        $results = array_filter($this->game_list, function ($game) {
            return $game['id'] == '4';
        });
        $game = reset($results); // Get the first matching game (ID 4)
        if (!$game) {
            abort(404, 'Game not found');
        }
        return view('games.show', compact('game')); // Reuse the games.show view
    }

    /**
     * Remove the specified resource from storage.
     */
   public function destroy($id)
{
    $key = array_search($id, array_column($this->game_list, 'id'));
    if ($key !== false) {
        $game = $this->game_list[$key];
        unset($this->game_list[$key]);
        $this->game_list = array_values($this->game_list);
        file_put_contents(base_path('database/datasource.php'), "<?php\n\nreturn " . var_export($this->game_list, true) . ";\n");
        return response()->json([
            'message' => 'Record Successfully Deleted.',
            'content' => $game,
            'updated_list' => $this->game_list
        ]);
    }
    return response()->json(['message' => 'Game not found'], 404);
}
}