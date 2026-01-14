<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite(['resources/css/app.css'])

    <title>Projeto Laravel</title>
</head>
<body class="bg-login">
    <div class="card-login">
        <div class="logo-wrapper-login">
            <a href="{{ route('login') }}">
                <img src="{{ asset('images/Laravel.svg.png')}}" alt="logo" class="logo-login">
            </a>
        </div>
        @yield('content')
    </div>
</body>
</html>
