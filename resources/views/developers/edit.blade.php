@extends ('layouts.master')
@section ('content')

    @if(count($developer) > 0)
        <div class="row">
            <div class="col-6">
                <h2>Developer: {{ $developer->name }}</h2>

                <form method="POST" action="{{ route('developers.update', $developer->id) }}">
                    {{ csrf_field() }}
                    {{ method_field('PATCH') }}
                    <div class="form-group">
                        <label for="name">Name</label>
                        <input type="text" class="form-control" name="name" value="{{$developer['name']}}">
                    </div>
                    <div class="form-group">
                        <label for="country">Country</label>
                        <input type="text" class="form-control" name="country" value="{{$developer['country']}}">
                    </div>
                    <div class="form-group">
                        <label for="employees">Nr. of employees</label>
                        <input type="number" class="form-control" name="employees" value="{{$developer['employees']}}">
                    </div>
                    <div class="form-group">
                        <label for="date_of_creation">Date of creation</label>
                        <input type="date" class="form-control" name="date_of_creation" value="{{$developer['date_of_creation']}}">
                    </div>
                    <div class="form-group">
                        <input class="form-control btn-success" type="submit" value="Save" />
                    </div>

                </form>
                <form method="post" action="{{ route('developers.delete', $developer->id) }}">
                    {{ csrf_field() }}
                    {{ method_field('DELETE') }}
                    <input class="form-control btn-danger" type="submit" value="Remove" />
                </form>
            </div>
            <div class="col-6">
                <h2>Games</h2>

                <ul>
                    @foreach($developer->games as $game)
                        <li>
                            <a href="{{ route('games.edit', $game->id) }}">{{ $game->title }}</a>
                        </li>
                    @endforeach
                </ul>
            </div>
        </div>
    @else
        <p>No developer found!</p>
    @endif

    <div class="container">
        <div class="row">
            <nav class="blog-pagination">
                <a class="btn btn-outline-secondary

                    @if(empty($pagination['developerCounter'][$pagination['developerNr'] - 1]))
                        disabled"
                    @else
                        " href="/developers/{{$pagination['developerCounter'][$pagination['developerNr'] - 1]}}/edit"
                    @endif

                    >Prev. Page
                </a>
                <a class="btn btn-outline-primary

                    @if(empty($pagination['developerCounter'][$pagination['developerNr'] + 1]))
                        disabled"
                    @else
                        " href="/developers/{{$pagination['developerCounter'][$pagination['developerNr'] + 1]}}/edit"
                    @endif

                    >Next Page
                </a>
            </nav>
        </div>
    </div>
@endsection
