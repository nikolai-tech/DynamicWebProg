<?php

namespace App\Http\Controllers;

use App\Models\Game;
use Illuminate\Http\Request;

class GameController extends Controller
{
    /**
     * Display a listing of the resource (READ all games).
     * @return \Illuminate\View\View
     */
    public function index()
    {
        $games = Game::all(); // Get ALL games from the 'games' table
        //return view('games.list', ['games' => $games]);
        return view('games.list', compact('games')); // Pass them to your 'games.list' view
    }

    /**
     * Show the form for creating a new resource (CREATE form).
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('games.create'); // Show the form to add a new game
    }

    /**
     * Store a newly created resource in storage (SAVE new game).
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        // 1. Validate the incoming data from the form
        $validatedData = $request->validate([
            'title' => 'required|string|max:255',
            'developer' => 'required|string|max:255',
            'genre' => 'nullable|string|max:255',
            'release_date' => 'required|date',
            'price' => 'required|numeric|min:0',
            'description' => 'nullable|string',
            // For checkboxes, 'sometimes|boolean' or 'sometimes|accepted' works well.
            // Using 'sometimes' means it's only validated if present.
            // If the checkbox is unchecked, it simply won't be in the request data.
            'available' => 'sometimes|boolean',
        ]);

        // If the 'available' checkbox was not checked, it won't be in $validatedData.
        // We set it to false if it's missing (unchecked).
        $validatedData['available'] = $request->has('available');


        // 2. Create a new Game record in the database using the validated data
        Game::create($validatedData);

        // 3. Redirect back to the games list with a success message
        return redirect()->route('games.index')->with('success', 'Game added successfully!');
    }

    /**
     * Display the specified resource (READ one game).
     * This uses Route Model Binding: Laravel automatically finds the Game based on the ID in the URL.
     * @param  \App\Models\Game  $game
     * @return \Illuminate\View\View|\Illuminate\Http\JsonResponse
     */
    public function show(string $id)
    {
        $game = Game::find($id);
        // $game now contains the Game model found by the ID in the URL
        return view('games.show', compact('game')); // Pass the single game to a 'games.show' view
        // Or if it's an API, return as JSON:
        // return response()->json($game);
    }

    /**
     * Show the form for editing the specified resource (UPDATE form).
     * @param  \App\Models\Game  $game
     * @return \Illuminate\View\View
     */
    public function edit(string $id)
    {
        $game = Game::find($id);
        // Pass the existing game data to the form for editing
        return view('games.edit', compact('game'));
    }

    /**
     * Update the specified resource in storage (SAVE updates).
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Game  $game
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, string $id)
    {
        // 1. Validate the updated data
        $validatedData = $request->validate([
            'title' => 'required|string|max:255',
            'developer' => 'required|string|max:255',
            'genre' => 'nullable|string|max:255',
            'release_date' => 'required|date',
            'price' => 'required|numeric|min:0',
            'description' => 'nullable|string',
            'available' => 'sometimes|boolean',
        ]);

        $validatedData['available'] = $request->has('available');

        // 2. Update the existing Game record in the database
        $game = Game::find($id);
        $game->update($validatedData);

        // 3. Redirect back to the games list or show page with a success message
        return redirect()->route('games.index')->with('success', 'Game updated successfully!');
    }

    /**
     * Remove the specified resource from storage (DELETE game).
     * @param  \App\Models\Game  $game
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Http\JsonResponse
     */
    public function destroy(string $id)
    {
        // Delete the game record from the database
        $game = Game::find($id);
        $game->delete();

        // Redirect back to the games list with a success message
        return redirect()->route('games.index')->with('success', 'Game deleted successfully!');
        // Or for API: return response()->json(['message' => 'Game deleted successfully'], 200);
    }
}
