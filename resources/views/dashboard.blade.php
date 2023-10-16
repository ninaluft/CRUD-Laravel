@extends('template_crud')

@section('content')
<html>

<head>
    <meta charset="UTF-8">
    <title>Sistema ADS</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
</head>

<body>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6">

                    <div id="menu" class="offcanvas offcanvas-start">
                        <div class="offcanvas-header">
                            <h2 style="font-size: 24px; font-weight: bold;">CADASTROS</h2>
                            <button data-bs-dismiss="offcanvas" type="button" class="btn-close"></button>
                        </div>

                        <div class="offcanvas-body">
                            <ul class="list-unstyled">
                                <li><a href="{{ url('/alunos') }}" class="btn btn-lg">ALUNOS</a></li>
                                <li><a href="{{ url('/cidades') }}" class="btn btn-lg">CIDADES</a></li>
                                <li><a href="{{ url('/funcionarios') }}" class="btn btn-lg">FUNCIONÁRIOS</a></li>
                            </ul>
                        </div>
                    </div>

                    <div class="text-center">
                        <h5>Bem-Vindo ao Sistema ADS UPF</h5><br>
                        <a data-bs-toggle="offcanvas" class="btn btn-primary" href="#menu">Começar</a>
                    </div>

                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
</body>

</html>
@endsection