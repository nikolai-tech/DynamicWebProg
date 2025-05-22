<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Game extends Model
{
    /**
     * The table associated with the model.
     * Eloquent assumes the table name is the plural, snake_case version of the model name.
     * (e.g., 'Game' -> 'games'). So, this line is optional if you follow the convention,
     * but good to include for clarity.
     * @var string
     */
    protected $table = 'games';

    /**
     * The attributes that are mass assignable.
     * These are the column names that you can fill using `Game::create()` or `->fill()`.
     * @var array<int, string>
     */
    protected $fillable = [
        'title',
        'developer',
        'genre',
        'release_date',
        'price',
        'description',
        'available',
    ];

    /**
     * The attributes that should be cast to native types.
     * This tells Eloquent to automatically convert database values to specific PHP types.
     * E.g., 'release_date' will become a Carbon date object, 'available' will be a true/false boolean.
     * @var array<string, string>
     */
    protected $casts = [
        'release_date' => 'date', // Makes release_date a Carbon instance
        'available' => 'boolean', // Makes available true/false
    ];
}
