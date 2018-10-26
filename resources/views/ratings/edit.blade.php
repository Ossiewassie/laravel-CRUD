@extends ('layout')
@section ('content')
    <h3>Read/Update Rating</h3>
    @if(count($rating) > 0)
        <form method="POST" action="{{ route('ratings.update', $rating->id) }}">
            {{ csrf_field() }}
            {{ method_field('PATCH') }}
            <div class="form-group">
                <label for="rating">Rating</label>
                <input type="number" class="form-control" name="rating" value="{{$rating['rating']}}">
            </div>
            <div class="form-group">
                <label for="game_id">Game</label>
                <input type="text" class="form-control" name="game_id" value="{{$rating['game_id']}}">
            </div>
            <div class="form-group">
                <input class="form-control btn-success" type="submit" value="Save" />
            </div>
        </form>
        <form method="post" action="{{ route('ratings.delete', $rating->id) }}">
            {{ csrf_field() }}
            {{ method_field('DELETE') }}
            <input class="form-control btn-danger" type="submit" value="Remove" />
        </form>
    @else
        <p>No rating found!</p>
    @endif

    <div class="container">
        <div class="row">
            <nav class="blog-pagination">
                <a class="btn btn-outline-secondary

                    @if(empty($pagination['ratingCounter'][$pagination['ratingNr'] - 1]))
                        disabled"
                @else
                    " href="/ratings/{{$pagination['ratingCounter'][$pagination['ratingNr'] - 1]}}/edit"
                @endif

                >Prev. Page
                </a>
                <a class="btn btn-outline-primary

                    @if(empty($pagination['ratingCounter'][$pagination['ratingNr'] + 1]))
                        disabled"
                @else
                    " href="/ratings/{{$pagination['ratingCounter'][$pagination['ratingNr'] + 1]}}/edit"
                @endif

                >Next Page
                </a>
            </nav>
        </div>
    </div>
@endsection