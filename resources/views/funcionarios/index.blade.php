@extends('template_crud')
@section('content')

<div class="card">

    <div class="card-header">
        <h4>Lista de Funcionários</h4>
    </div>

    <div class="card-body">

        @if ($message = Session::get('success'))
        <div class="row">
            <div class="alert alert-success alert-dismissible">
                <div>{{ $message }}</div>
                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            </div>
        </div>
        @endif

        <div class="row">
            <div class="col">
                <a class="btn btn-success float-end" href="{{ url('/funcionarios/novo') }}">Cadastrar</a>
            </div>
        </div>

        <br>

        <div class="row">
            <div class="col">
                <table class="table table-bordered table-hover">
                    <tr>
                        <th>Nome</th>
                        <th>Cargo</th>
                        <th>Email</th>
                        <th>Salário</th>
                        <th>Ações</th>
                    </tr>

                    @foreach($funcionarios as $funcionario)
                    <tr>
                        <td>{{ $funcionario['nome'] }}</td>
                        <td>{{ $funcionario['cargo'] }}</td>
                        <td>{{ $funcionario['email'] }}</td>
                        <td>{{ 'R$ ' . number_format($funcionario['salario'], 2, ',', '.') }}</td>
                        <td>
                            <a class="btn btn-primary " href="{{ url('/funcionarios/editar', ['id' => $funcionario['id']] ) }}">Editar</a>
                            <a onclick="funConfirma(this)" data-bs-toggle="modal" data-bs-target="#exampleModal" class="btn btn-danger" href="{{ url('/funcionarios/delete', ['id' => $funcionario['id']] ) }}">Excluir</a>
                        </td>
                    </tr>
                    @endforeach

                    <tr>
                        <td>Total de Funcionários: {{ $total }}</td>
                        <td colspan="4"></td>
                    </tr>

                </table>
            </div>
        </div>

        <div class="row">
            <div class="col">
                <a class="btn btn-secondary float-end" href="{{ url('/dashboard') }}">Voltar</a>
            </div>
        </div>
    </div>
</div>


<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Confirmação</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                Deseja realmente deletar esse registro?
            </div>
            <div class="modal-footer">
                <a class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</a>
                <a id="btnConfirma" class="btn btn-primary">Confirmar</a>
            </div>
        </div>
    </div>
</div>

@endsection

<script>
    function funConfirma(elemento) {
        document.getElementById('btnConfirma').setAttribute('href', elemento.href);
    }
</script>