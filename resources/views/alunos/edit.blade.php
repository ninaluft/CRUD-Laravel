@extends('template_crud')
@section('content')

<div class="card">
    <div class="card-header">
        <h4>Edição de Aluno</h4>
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
            <form action="{{ url('alunos/editar') }}" method="POST">
                @csrf
                <div class="row">

                    <!-- campo oculto passando o ID como parâmetro no request -->
                    <input type="hidden" name="id" value="{{ $aluno['id'] }}">

                    <strong>Nome:</strong>
                    <input class="form-control mb-3" name="nome" type="text" value="{{ $aluno['nome'] }}" />

                    <strong>Idade:</strong><br>
                    <input class="form-control mb-3" name="idade" type="number" value="{{ $aluno['idade'] }}" />

                    <strong>Email:</strong><br>
                    <input class="form-control mb-3" name="email" type="text" value="{{ $aluno['email'] }}" />

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