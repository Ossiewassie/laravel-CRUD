<div class="container">
    <header class="blog-header py-3">
        <div class="row flex-nowrap justify-content-between align-items-center">
            <div class="col-4 pt-1">
            </div>
            <div class="col-4 text-center">
                <a class="blog-header-logo text-dark" href="{{route('index')}}">Games</a>
            </div>
            <div class="col-4 d-flex justify-content-end align-items-center">
            </div>
        </div>
    </header>

    <div class="nav-scroller py-1 mb-2">
        <nav class="nav d-flex justify-content-center">
            <a class="p-2 text-muted" href="{{route('games.index')}}">Games</a>
            <a class="p-2 text-muted" href="{{route('developers.index')}}">Developers</a>
        </nav>
    </div>

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
</div>