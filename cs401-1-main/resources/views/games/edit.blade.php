@extends('layouts.master')

@section('title', 'Edit Game ' . $game->title)

@section('content')
    <h1>Edit Game</h1>
    <div class="games-container" style="max-width: 700px; margin: 50px auto;">
        {{-- Display validation errors if any --}}
        @if ($errors->any())
            <div style="background-color: #f8d7da; color: #721c24; padding: 10px; border-radius: 5px; margin-bottom: 20px;">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        {{-- The form itself, wrapped in a card-like div --}}
        <div class="game-card"> {{-- Reusing the .game-card style --}}
            <form action="{{ route('games.update', $game->id) }}" method="POST">
                @csrf {{-- CSRF Token for security --}}
                @method('PUT') {{-- This tells Laravel that this POST request is actually for a PUT/PATCH update --}}

                <div class="form-group">
                    <label for="title">Game Title:</label>
                    <input type="text" id="title" name="title" value="{{ old('title', $game->title) }}" required>
                    @error('title')
                        <div class="error-message">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="developer">Developer:</label>
                    <input type="text" id="developer" name="developer" value="{{ old('developer', $game->developer) }}" required>
                    @error('developer')
                        <div class="error-message">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="genre">Genre:</label>
                    <input type="text" id="genre" name="genre" value="{{ old('genre', $game->genre) }}">
                    @error('genre')
                        <div class="error-message">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="release_date">Release Date:</label>
                    <input type="date" id="release_date" name="release_date" value="{{ old('release_date', $game->release_date ? $game->release_date->format('Y-m-d') : '') }}" required>
                    @error('release_date')
                        <div class="error-message">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="price">Price ($):</label>
                    <input type="number" id="price" name="price" value="{{ old('price', $game->price) }}" step="0.01" min="0" required>
                    @error('price')
                        <div class="error-message">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="description">Description:</label>
                    <textarea id="description" name="description" rows="5">{{ old('description', $game->description) }}</textarea>
                    @error('description')
                        <div class="error-message">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group">
                    <input type="checkbox" id="available" name="available" value="1" {{ old('available', $game->available) ? 'checked' : '' }}>
                    <label for="available" style="display: inline-block;">Available for Purchase</label>
                    @error('available')
                        <div class="error-message">{{ $message }}</div>
                    @enderror
                </div>

                <button type="submit" class="btn-submit">Save</button>
            </form>
        </div>
    </div>
@endsection

{{-- Push Flatpickr JavaScript to the scripts stack --}}
@push('scripts')
    <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            flatpickr("#release_date", {
                dateFormat: "Y-m-d", // Date format (e.g., 2025-05-21)
                altInput: true, // Show user-friendly date in input
                altFormat: "F j, Y", // User-friendly date format (e.g., May 21, 2025)
                maxDate: "today", // Don't allow future dates
                // Add any other Flatpickr options here
            });
        });
    </script>
@endpush