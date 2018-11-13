@extends ('layouts.master')

@section ('content')
    <a href="{{ route('developers.create') }}" class="btn btn-primary btn-sm active" style="margin-bottom: 5px;">Create new developer</a>

    @if(count($developers) > 0)
        <table class="table table-dark table-hover">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Name</th>
                    <th scope="col">Country</th>
                    <th scope="col">Employees</th>
                    <th scope="col">Date of creation</th>
                </tr>
            </thead>
            <tbody>
                @foreach($developers as $developer)
                    <tr>
                        <th scope="row">{{ $developer->id }}</th>
                        <td><a href="{{ route('developers.edit', [$developer->id]) }}">{{ $developer->name }}</a></td>
                        <td>{{ $developer->country }}</td>
                        <td>{{ $developer->employees }}</td>
                        <td>{{ $developer->date_of_creation }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @else
        <p>No developers found!</p>
    @endif
@endsection
