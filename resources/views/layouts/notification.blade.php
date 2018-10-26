@if($message = Session::get('success'))
    <div class="notification-area" style="position: absolute; width: 200px; height: 100px; left: 20px; top: 30px; ">
        <div class="alert alert-success">
            <p style="margin-bottom: 0;">{{$message}}</p>
        </div>
    </div>
@elseif ($errors->all())
    <div class="notification-area" style="position: absolute; width: 200px; height: 100px; left: 20px; top: 30px; ">
        <div class="alert alert-danger">
            <ul style="margin-bottom: 0;">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    </div>
@endif