@extends ('layouts.master')

@section ('content')

    <h3>Create New Game</h3>
        <form method="POST" action="{{ route('games.store') }}">
            {{ csrf_field() }}

            <div class="form-group">
                <label for="title">Title</label>
                <input type="text" class="form-control" name="title">
            </div>
            <div class="form-group">
                <label for="genre">Genre</label>
                <input type="text" class="form-control" name="genre">
            </div>
            <div class="form-group">
                <label for="online">Online</label>
                <select class="form-control" name="online" name="online">
                    <option value="1">Yes</option>
                    <option value="0">No</option>
                </select>
            </div>
            <div class="form-group">
                <label for="developer_id">Developer</label>
                <select class="form-control" name="developer_id" id="developer_id">
                    <option value="">-</option>
                    @foreach($developers as $developer)
                        <option value="{{ $developer->id }}" >{{ $developer->name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <input type="submit" class="form-control btn-success" value="Save"/>
            </div>
        </form>

@endsection
