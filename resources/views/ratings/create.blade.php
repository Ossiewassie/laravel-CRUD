@extends ('layout')

@section ('content')
    <h3>Create New Rating</h3>
    <form method="POST" action="{{ route('ratings.store') }}">
        {{ csrf_field() }}

        <div class="form-group">
            <label for="rating">Rating</label>
            <input type="number" class="form-control" name="rating">
        </div>
        <div class="form-group">
            <label for="game_id">Game</label>
            <input type="text" class="form-control" name="game_id">
        </div>
        <div class="form-group">
            <input type="submit" class="form-control btn-success" value="Save"/>
        </div>
    </form>
@endsection
