@extends('layouts.master')

@section('title', 'Week 3 Coding Practice')

@section('content')
<div class="container"> {{-- You might want to wrap your content in a main container --}}
        <h1>Games List</h1>
        @if (empty($games))
            <h3>No Available Games in the list.</h3>
        @else
            <div class="games-container"> {{-- This div will arrange cards horizontally --}}
                @foreach ($games as $game)
                    <div class="game-card">
                        <h2>{{ $game->title }}</h2>
                        <p><strong>Developer:</strong> {{ $game->developer }}</p>
                        <p><strong>Genre:</strong> {{ $game->genre ?? 'N/A' }}</p> {{-- Use ?? for fallback if genre might be missing --}}
                        <p><strong>Release Date: {{ $game->release_date}}</strong></p>
                        <p class="price">Price: ${{ number_format($game->price ?? 0, 2) }}</p>

                        {{-- Conditional display for availability --}}
                        <p>Status:
                            @if (($game->available ?? false) == true) {{-- Check if 'available' exists and is true --}}
                                <span class="status-available">Available</span>
                            @else
                                <span class="status-unavailable">Unavailable</span>
                            @endif
                        </p>

                        {{-- Display features if available and not empty --}}
                        @if (!empty($game->features))
                            <p><strong>Key Features:</strong></p>
                            <ul class="features-list">
                                @foreach ($game['features'] as $feature)
                                    <li>{{ $feature }}</li>
                                @endforeach
                            </ul>
                        @endif

                            <a class="btn-link-primary" href="{{ route('games.show', $game->id) }}">
                                Show Details
                            </a>
                    </div>
                @endforeach
            </div>
        @endif
    </div>
@endsection