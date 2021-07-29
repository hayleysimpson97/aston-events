<!DOCTYPE html>
<html lang="en">
    <head>
        <link href="{{ secure_asset('css/app.css') }}" rel="stylesheet">
    </head>

    <body>
    <ul class="nav">
        <li class="astonEvents" onclick="window.location='{{ url("/") }}'">Aston Events</li>
        <li onclick="window.location='{{ url("register") }}'">Register </li>
        <li onclick="window.location='{{ url("login") }}'">Login</li>
        @if( auth()->check() )
        <li onclick="window.location='{{ url("/createevent") }}'">Create Event</li>
            <li onclick="window.location='{{ url("/yourevents") }}'">{{ auth()->user()->name }}</li>
            <li onclick="window.location='{{ url("/logout") }}'">Logout</li>
        @endif
    </ul>

    @yield('content')

    </body>

</html>