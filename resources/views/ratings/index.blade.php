@extends ('layout')

@section ('content')
    @if(count($ratings) > 0)
        <table class="table table-dark table-hover">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Rating</th>
                    <th scope="col">Game</th>
                    <th scope="col">User</th>
                </tr>
            </thead>
            <tbody>
                @foreach($ratings as $rating)
                    <tr>
                        <th scope="row">{{ $rating->id }}</th>
                        <td><a href="{{ route('ratings.edit', [$rating->id]) }}">{{ $rating->rating }}</a></td>
                        <td>{{ $rating->game_id }}</td>
                        <td> @if($rating->user_id == NULL) Anon @else {{$rating->user_id}} @endif </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @else
        <p>No ratings found!</p>
    @endif
@endsection
