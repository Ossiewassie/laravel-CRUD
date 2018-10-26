<!doctype html>
<html>
    <head>
        <link href="https://getbootstrap.com/docs/4.1/dist/css/bootstrap.min.css" rel="stylesheet">
        <link href="{{ URL::asset('css/blog.css') }}" rel="stylesheet">
        <title>Games Website</title>
    </head>
    <body>

        @include ('layouts.header')

        @include ('layouts.notification')

        <div class="container">
            @yield('content')
        </div>

        @include ('layouts.footer')

    </body>
</html>