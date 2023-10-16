<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Sistema ADS</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">

</head>

<body class="antialiased" style="background-color: #F3F4F6;">
    <div class="container">
        <div class="text-center">
            <br><br><BR>
            <img src="{{ asset('img/upflogo2.png') }}">
            <h3>Sistema ADS</h3><br>

            @if (Route::has('login'))
            <div class="sm:fixed sm:top-0 sm:right-0 p-6 text-right z-10">
                @auth
                <script>
                    window.location.href = "{{ route('dashboard') }}";
                </script>
                @else
                <a class="btn btn-primary" href="{{ route('login') }}">Entrar</a>

                @if (Route::has('register'))
                <a class="btn btn-secondary" href="{{ route('register') }}">Registrar</a>
                @endif
                @endauth
            </div>
            @endif

        </div>
    </div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
</body>

</html>