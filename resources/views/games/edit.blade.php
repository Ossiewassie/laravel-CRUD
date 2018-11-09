@extends ('layout')
@section ('content')
    <div class="row">
        @if(count($game) > 0)
            <div class="col-6">
                <h3>Read/Update Game</h3>
                <form method="POST" action="{{ route('games.update', $game->id) }}">
                    {{ csrf_field() }}
                    {{ method_field('PATCH') }}
                    <div class="form-group">
                        <label for="title">Title</label>
                        <input type="text" class="form-control" name="title" value="{{$game['title']}}">
                    </div>
                    <div class="form-group">
                        <label for="genre">Genre</label>
                        <input type="text" class="form-control" name="genre" value="{{$game['genre']}}">
                    </div>
                    <div class="form-group">
                        <label for="rating">Rating</label>
                        <input type="number" class="form-control" name="rating" disabled value="{{$game['rating']}}">
                    </div>
                    <div class="form-group">
                        <label for="online">Online</label>
                        <select class="form-control" name="online" id="online">
                            <option value="1" @if($game->online == 1) selected @endif>Yes</option>
                            <option value="0" @if($game->online == 0) selected @endif>No</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="developer_id">Developer</label>
                        <select class="form-control" name="developer_id" id="developer_id">
                            <option value="">-</option>
                            @foreach($developers as $developer)
                                <option value="{{ $developer->id }}" @if($game->developer && $developer->id == $game->developer->id) selected @endif>{{ $developer->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <input class="form-control btn-success" type="submit" value="Save" />
                    </div>
                </form>
                <form method="post" action="{{ route('games.delete', $game->id) }}">
                    {{ csrf_field() }}
                    {{ method_field('DELETE') }}
                    <input class="form-control btn-danger" type="submit" value="Remove" />
                </form>
            </div>
            <div class="col-6">
                <h2>Developer</h2>
                @if ($game->developer)
                    <a href="{{ route('developers.edit', $game->developer->id) }}">{{ $game->developer->name }}</a>
                @else
                    Geen developer bekend
                @endif

                <h2>Ratings</h2>
                @if ($game->ratings->count())
                    <ul>
                        @foreach($game->ratings as $rating)
                            <li>{{ $rating->rating }}</li>
                        @endforeach
                    </ul>
                @else
                    No ratings
                @endif

            </div>
        @else
            <p>No game found!</p>
        @endif
    </div>

    <div class="container">
        <div class="row">
            <nav class="blog-pagination">
                <a class="btn btn-outline-secondary
                @if(empty($pagination['gameCounter'][$pagination['gameNr'] - 1]))
                    disabled"
                @else
                    " href="/games/{{$pagination['gameCounter'][$pagination['gameNr'] - 1]}}/edit"
                @endif

                    >Prev. Page
                </a>
                <a class="btn btn-outline-primary

                    @if(empty($pagination['gameCounter'][$pagination['gameNr'] + 1]))
                        disabled"
                    @else
                        " href="/games/{{$pagination['gameCounter'][$pagination['gameNr'] + 1]}}/edit"
                    @endif

                    >Next Page
                </a>
            </nav>
        </div>
    </div>
@endsection
