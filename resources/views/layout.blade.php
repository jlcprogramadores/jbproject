<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
</head>

<body>
    <h3>Menu Layout</h3>

    <ul>
        <li><a href="{{ route('login') }}">Login</a></li>
        <li><a href="{{ route('home') }}">Home</a></li>
        <li><a href="{{ route('cliente.tabla') }}">Cliente</a></li>
    </ul>
    
    <div>
        @yield('content')
    </div>
</body>

</html>