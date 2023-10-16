@vite(['resources/css/app.css', 'resources/js/app.js'])

<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Sistema ADS</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
</head>

<body>
  @include('layouts.navigation')
  <div class="container">
    <div class="row mt-3">
      <div>
        @yield('content')
      </div>
    </div>
  </div>

  <style>
    body {
      background-color: #F3F4F6;
    }

    .card-header {
      text-align: center;
    }

    tr {
      text-align: center;
    }

    .titulo {
      text-align: center;
      margin: 20px;
    }

    .menu {
      margin: 50px;
      text-align: center;
    }

    .menu .btn {
      margin: 10px;
      background-color: green;
      opacity: 0.8;
      color: white;
    }

    .menu .btn:hover {
      background-color: darkgray;
      color: white;
    }

    .offcanvas-body li:hover {
      background-color: lightgray;
    }


  </style>


  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>

  <!--Máscara para formatar o campo de salário -->
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.inputmask/5.0.6/jquery.inputmask.min.js"></script>
  <script>
    $(document).ready(function() {
      $('.salario-field').inputmask('currency', {
        radixPoint: ',',
        groupSeparator: '.',
        allowMinus: false,
        autoGroup: true,
        prefix: 'R$ ',
        digits: 2,
        rightAlign: false,
        unmaskAsNumber: true,
      });
    });
  </script>

</body>

</html>