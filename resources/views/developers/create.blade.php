@extends ('layouts.master')

@section ('content')

    <h3>Create Developer</h3>
        <form method="POST" action="{{ route('developers.store') }}">
            {{ csrf_field() }}

            <div class="form-group">
                <label for="name">Name</label>
                <input type="text" class="form-control" name="name">
            </div>
            <div class="form-group">
                <label for="country">Country</label>
                <input type="text" class="form-control" name="country">
            </div>
            <div class="form-group">
                <label for="employees">Nr. of employees</label>
                <input type="number" class="form-control" name="employees" >
            </div>
            <div class="form-group">
                <label for="date_of_creation">Date of creation</label>
                <input type="date" class="form-control" name="date_of_creation">
            </div>
            <div class="form-group">
                <input class="form-control btn-success" type="submit" value="Save" />
            </div>
        </form>

@endsection
