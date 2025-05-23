<div>
    <h1>Game Details</h1>
    @if ($game)
        <ul>
            <li><b>ID:</b> {{ $game['id'] }}</li>
            <li><b>Title:</b> {{ $game['title'] }}</li>
            <li><b>Developer:</b> {{ $game['developer'] }}</li>
            <li><b>Publisher:</b> {{ $game['publisher'] }}</li>
            <li><b>Genre:</b> {{ $game['genre'] }}</li>
            <li><b>Release Date:</b> {{ $game['releaseDate'] }}</li>
            <li><b>Platform:</b> {{ $game['platform'] }}</li>
            <li><b>Price:</b> ${{ $game['price'] }}</li>
        </ul>
        <a href="{{ route('games.index') }}">Back to List</a>
    @else
        <p>Game not found.</p>
    @endif
</div>