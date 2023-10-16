@extends('template_crud')
@section('content')

<div class="card">
    <div class="card-header">
        <h4 >Cadastro de Funcionários</h4>
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
            <form action="{{ url('funcionarios/novo') }}" method="POST">
                @csrf
                <div class="row">

                    <strong>Nome:</strong>
                    <input placeholder="Informe o nome" class="form-control mb-3" name="nome" type="text" value="{{ old('nome') }}" />

                    <strong>Cargo:</strong>
                    <input placeholder="Informe o cargo" class="form-control mb-3" name="cargo" type="text" value="{{ old('cargo') }}" />

                    <strong>Email:</strong>
                    <input placeholder="Informe seu email" class="form-control mb-3" name="email" type="text" value="{{ old('email') }}" />

                    <strong>Salário:</strong>
                    <input placeholder="Informe o salário" type="text" class="form-control salario-field mb-3" name="salario" id="salario" value="{{ old('salario') }}">

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