@extends ('layout')

@section ('content')
    <a href="{{ route('games.create') }}" class="btn btn-primary btn-sm active" style="margin-bottom: 5px;">Create new yeet</a>

    @if(count($games) > 0)
        <table class="table table-dark table-hover">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Title</th>
                    <th scope="col">Genre</th>
                    <th scope="col">Developer</th>
                    <th scope="col">Rating</th>
                    <th scope="col">Online</th>
                </tr>
            </thead>
            <tbody>
                @foreach($games as $game)
                    <tr>
                        <th scope="row">{{ $game->id }}</th>
                        <td><a href="{{ route('games.edit', [$game->id]) }}">{{ $game->title }}</a></td>
                        <td>{{ array_get($game, 'genre') }}</td>
                        <td>{{ array_get($game, 'developer.name', 'Unknown')  }}</td>
                        <td>
                            @if ($game->averageRating)
                                {{ round($game->averageRating, 1) }}</td>
                            @else
                                -
                            @endif
                        <td>
                            @if($game->online == 1)
                                Yes
                            @else
                                No
                            @endif
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @else
        <p>No games found!</p>
    @endif
    <a href="{{ route('ratings.create') }}" class="btn btn-primary btn-sm active" style="margin-bottom: 5px;">Add rating</a>
@endsection
