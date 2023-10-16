@extends('template_crud')
@section('content')

<div class="card">
    <div class="card-header">
        <h4>Edição de Cidade</h4>
    </div>
    <div class="card-body">
        <div class="row">
            @if($errors->any())
            <div class="alert alert-danger alert-dismissible">
                <strong>Problemas nos dados!</strong>
                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                @foreach($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </div>
            @endif
        </div>

        <div class="row">
            <form action="{{ url('cidades/editar') }}" method="POST">
                @csrf
                <div class="row">

                    <!-- campo oculto passando o ID como parâmetro no request -->
                    <input type="hidden" name="id" value="{{ $cidade['id'] }}">

                    <strong>Nome:</strong>
                    <input class="form-control mb-3" name="nome" type="text" value="{{ old('nome', $cidade['nome']) }}" />

                    <strong>UF:</strong><br>
                    <select class="form-control" name="uf" id="uf">
                        @php
                        $estadoSelecionado = old('uf', $cidade['uf']);
                        $estados = [
                        'AC', 'AL', 'AP', 'AM', 'BA', 'CE', 'DF', 'ES', 'GO', 'MA', 'MT', 'MS',
                        'MG', 'PA', 'PB', 'PR', 'PE', 'PI', 'RJ', 'RN', 'RS', 'RO', 'RR', 'SC',
                        'SP', 'SE', 'TO'
                        ];
                        @endphp
                        @foreach ($estados as $estado)
                        <option value="{{ $estado }}" {{ $estado == $estadoSelecionado ? 'selected' : '' }}>
                            {{ $estado }}
                        </option>
                        @endforeach
                    </select>


                    <div class="col"><br>
                        <a class="btn btn-secondary" href="{{url('/cidades')}}">Voltar</a>
                    </div>
                    <div class="col"><br>
                        <button class="btn btn-primary float-end" type="submit">Salvar</button>
                    </div>
                </div>
            </form>
        </div>

    </div>
</div>

@endsection