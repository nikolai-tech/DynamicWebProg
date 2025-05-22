<?php

namespace Database\Seeders;

use App\Models\Game;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    protected $games;

    public function __construct()
    {
        $this->games = require __DIR__ . '/../../database/datasource.php';
    }
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        User::factory()->create([
            'name' => 'Test User',
            'email' => 'test@example.com',
        ]);

        // $this->call(GameSeeder::class); // <--- If you have separate Seeder class
        // Loop through each game data and create a record in the database
        foreach ($this->games as $game) {
            Game::create($game); // Eloquent's create method will insert this into your 'games' table
        }
        //php artisan db:seed --class=GameSeeder 
        //If you don't want to clear your database 
        //(e.g., you already have important data and just want to add more games), 
        //you can run only the specific seeder:
    }
}
