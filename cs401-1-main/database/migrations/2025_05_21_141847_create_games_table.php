<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     * This method is executed when you run `php artisan migrate`.
     * It builds your table.
     * @return void
     */
    public function up(): void
    {
        Schema::create('games', function (Blueprint $table) {
            $table->id(); // Auto-incrementing unique ID for each game
            $table->string('title'); // Text field for game title (e.g., 'Cyberpunk 2077')
            $table->string('developer'); // Text field for developer (e.g., 'CD Projekt Red')
            $table->string('genre')->nullable(); // Text field for genre (e.g., 'RPG'). `nullable()` means it's optional.
            $table->date('release_date'); // Date field for when the game was released
            $table->decimal('price', 8, 2); // Number field for price. `8` means up to 8 total digits, `2` means 2 after the decimal (e.g., 123456.78)
            $table->text('description')->nullable(); // Longer text field for game description. `nullable()` means it's optional.
            $table->boolean('available')->default(true); // True/False field for availability. `default(true)` sets it to true if not specified.

            $table->timestamps(); // Adds two special columns: `created_at` and `updated_at`. Laravel automatically manages these.
        });
    }

    /**
     * Reverse the migrations.
     * This method is executed when you run `php artisan migrate:rollback`.
     * It undoes what `up()` did.
     * @return void
     */
    public function down(): void
    {
        Schema::dropIfExists('games');
    }
};
