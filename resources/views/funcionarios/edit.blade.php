@extends('template_crud')
@section('content')

<div class="card">
    <div class="card-header">
        <h4>Edição de Funcionário</h4>
    </div>
    <div class="card-body">
        <div class="row">
            @if($errors->any())
            <div class="alert alert-danger alert-dismissible">
                <strong>Problemas nos seus dados!</strong>
                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                @foreach($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </div>
            @endif
        </div>

        <div class="row">
            <form action="{{ url('funcionarios/editar') }}" method="POST">
                @csrf
                <div class="row">
                    <!-- campo oculto passando o ID como parâmetro no request -->
                    <input type="hidden" name="id" value="{{ $funcionario['id'] }}">

                    <strong>Nome:</strong>
                    <input class="form-control mb-3" name="nome" type="text" value="{{ old('nome', $funcionario['nome']) }}" />

                    <strong>Cargo:</strong><br>
                    <input class="form-control mb-3" name="cargo" type="text" value="{{ old('cargo', $funcionario['cargo']) }}" />

                    <strong>Email:</strong><br>
                    <input class="form-control mb-3" name="email" type="text" value="{{ old('email', $funcionario['email']) }}" />

                    <strong>Salário:</strong><br>
                    <input type="text" class="form-control salario-field mb-3" name="salario" id="salario" value="{{ old('salario', number_format($funcionario['salario'], 2, ',', '.')) }}">

                    <div class="col">
                        <a class="btn btn-secondary" href="{{url('/funcionarios')}}">Voltar</a>
                    </div>
                    <div class="col">
                        <button class="btn btn-primary float-end" type="submit">Salvar</button>
                    </div>
                </div>
            </form>
        </div>

    </div>
</div>

@endsection