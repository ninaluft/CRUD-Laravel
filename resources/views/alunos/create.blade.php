@extends('template_crud')
@section('content')

<div class="card">
    <div class="card-header">
        <h4>Cadastro de Alunos</h4>
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
            <form action="{{ url('alunos/novo') }}" method="POST">
                @csrf
                <div class="row">

                    <strong>Nome:</strong>
                    <input placeholder="Informe o nome" class="form-control mb-3" name="nome" type="text" value="{{ old('nome') }}" />

                    <strong>Idade:</strong>
                    <input placeholder="Informe sua idade" class="form-control mb-3" name="idade" type="number" value="{{ old('idade') }}" />

                    <strong>Email:</strong>
                    <input placeholder="Informe seu email" class="form-control mb-3" name="email" type="text" value="{{ old('email') }}" />

                    <div class="col">
                        <a class="btn btn-secondary" href="{{url('/alunos')}}">Voltar</a>
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