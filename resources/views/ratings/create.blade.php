@extends ('layout')

@section ('content')
    <h3>Create New Rating</h3>
    <form method="POST" action="{{ route('ratings.store') }}">
        {{ csrf_field() }}
        <div class="form-group">
            <label for="game_id">Game</label>
            <select class="form-control" name="game_id" id="game_id">
                <option value="">-</option>
                @foreach($games as $game)
                    <option value="{{ $game->id }}" >{{ $game->title }}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="rating">Rating</label>
            <input type="number" class="form-control" name="rating">
        </div>
        <div class="form-group">
            <textarea name="description" placeholder="Write a description..." class="form-control"></textarea>
        </div>
        <div class="form-group">
            <input type="submit" class="form-control btn-success" value="Save"/>
        </div>
    </form>
@endsection
