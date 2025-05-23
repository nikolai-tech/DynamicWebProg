<div>
    <h1>Games List</h1>
    @if (empty($games))
        <p>No games found.</p>
    @else
        <ul>
            @foreach ($games as $game)
                <li style="color: rgb(36, 18, 101)">
                    <b><i>ID: {{ $game['id'] }}</i></b><br>
                    <b>Title: {{ $game['title'] }}</b><br>
                    <i>Developer: {{ $game['developer'] }}</i><br>
                    <i>Publisher: {{ $game['publisher'] }}</i><br>
                    <i>Genre: {{ $game['genre'] }}</i><br>
                    <i>Release Date: {{ $game['releaseDate'] }}</i><br>
                    <i>Platform: {{ $game['platform'] }}</i><br>
                    <i>Price: ${{ $game['price'] }}</i><br>
                </li>
            @endforeach
        </ul>
    @endif
</div>