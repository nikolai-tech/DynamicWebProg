@extends('layouts.master') {{-- Make sure this matches your main layout file --}}

@section('title', $game->title . ' Details') {{-- Dynamic title based on the game's title --}}

{{-- Push custom styles for Flatpickr if needed, or if you included it in app.css, you don't need this --}}
{{-- @push('styles')
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
    <style>
        .form-group {
            margin-bottom: 15px;
        }
        .form-group label {
            display: block;
            margin-bottom: 5px;
            font-weight: bold;
            color: #444;
        }
        .form-group input[type="text"],
        .form-group input[type="number"],
        .form-group input[type="date"],
        .form-group textarea {
            width: 100%;
            padding: 10px;
            border: 1px solid #ddd;
            border-radius: 4px;
            box-sizing: border-box;
        }
        .form-group input[type="checkbox"] {
            margin-right: 8px;
        }
        .btn-submit {
            background-color: #007bff;
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            font-size: 1em;
        }
        .btn-submit:hover {
            background-color: #0056b3;
        }
        .error-message {
            color: red;
            font-size: 0.9em;
            margin-top: 5px;
        }
    </style>
@endpush --}}

@section('content')
    <h1 style="text-align: center; margin-bottom: 30px;">{{ $game->title }} Details</h1>
    <div class="games-container" style="max-width: 700px; margin: 50px auto;">
        {{-- Display success message if redirected from update/store --}}
        @if (session('success'))
            <div style="background-color: #d4edda; color: #155724; padding: 10px; border-radius: 5px; margin-bottom: 20px;">
                {{ session('success') }}
            </div>
        @endif

        {{-- The game details card --}}
        <div class="game-card" style="padding: 30px;"> {{-- Reusing .game-card and adding some extra padding --}}
            <h2 style="margin-top: 0; color: #007bff;">{{ $game->title }}</h2>
            <p><strong>Developer:</strong> {{ $game->developer }}</p>
            <p><strong>Genre:</strong> {{ $game->genre ?? 'N/A' }}</p> {{-- Use ?? 'N/A' if genre can be null --}}
            <p><strong>Release Date:</strong> {{ $game->release_date->format('F j, Y') }}</p> {{-- Format the Carbon date object --}}
            <p class="price"><strong>Price:</strong> ${{ number_format($game->price, 2) }}</p>
            <p><strong>Status:</strong>
                @if ($game->available)
                    <span class="status-available">Available</span>
                @else
                    <span class="status-unavailable">Unavailable</span>
                @endif
            </p>

            @if ($game->description)
                <p><strong>Description:</strong></p>
                <p style="white-space: pre-wrap;">{{ $game->description }}</p> {{-- pre-wrap preserves line breaks from textarea --}}
            @endif

            {{-- Optional: Add buttons for Edit and Delete --}}
            <div style="margin-top: 25px; display: flex; gap: 10px;">
                <a href="{{ route('games.edit', $game->id) }}"
                   style="background-color: #ffc107; color: #333; padding: 8px 15px; border-radius: 4px; text-decoration: none;">
                    Edit
                </a>

                <form action="{{ route('games.destroy', $game->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this game?');">
                    @csrf
                    @method('DELETE') {{-- This tells Laravel it's a DELETE request --}}
                    <button type="submit"
                            style="background-color: #dc3545; color: white; padding: 8px 15px; border: none; border-radius: 4px; cursor: pointer;">
                        Delete
                    </button>
                </form>

                <a href="{{ route('games.index') }}"
                   style="background-color: #6c757d; color: white; padding: 8px 15px; border-radius: 4px; text-decoration: none;">
                    Back to List
                </a>
            </div>
        </div>
    </div>
@endsection