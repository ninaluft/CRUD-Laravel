@extends('template_crud')
@section('content')

<div class="card">
    <div class="card-header">
        <h4>Cadastro de Cidades</h4>
    </div>
    <div class="card-body">
        <div class="row">
            @if($errors->any())
            <div class="alert alert-danger alert-dismissible">
                <strong>Problemas nos dados informados!</strong>
                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                @foreach($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </div>
            @endif
        </div>

        <div class="row">
            <form action="{{ url('cidades/novo') }}" method="POST">
                @csrf
                <div class="row">

                    <strong>Nome:</strong>
                    <input placeholder="Informe o nome" class="form-control mb-3" name="nome" type="text" value="{{ old('nome') }}" />

                    <strong>UF:</strong>
                    <select class="form-control" name="uf" id="uf">
                        <option value="" selected>Selecione</option>
                        <option value="AC" @if(old('uf')=='AC' ) selected @endif>AC</option>
                        <option value="AL" @if(old('uf')=='AL' ) selected @endif>AL</option>
                        <option value="AP" @if(old('uf')=='AP' ) selected @endif>AP</option>
                        <option value="AM" @if(old('uf')=='AM' ) selected @endif>AM</option>
                        <option value="BA" @if(old('uf')=='BA' ) selected @endif>BA</option>
                        <option value="CE" @if(old('uf')=='CE' ) selected @endif>CE</option>
                        <option value="DF" @if(old('uf')=='DF' ) selected @endif>DF</option>
                        <option value="ES" @if(old('uf')=='ES' ) selected @endif>ES</option>
                        <option value="GO" @if(old('uf')=='GO' ) selected @endif>GO</option>
                        <option value="MA" @if(old('uf')=='MA' ) selected @endif>MA</option>
                        <option value="MT" @if(old('uf')=='MT' ) selected @endif>MT</option>
                        <option value="MS" @if(old('uf')=='MS' ) selected @endif>MS</option>
                        <option value="MG" @if(old('uf')=='MG' ) selected @endif>MG</option>
                        <option value="PA" @if(old('uf')=='PA' ) selected @endif>PA</option>
                        <option value="PB" @if(old('uf')=='PB' ) selected @endif>PB</option>
                        <option value="PR" @if(old('uf')=='PR' ) selected @endif>PR</option>
                        <option value="PE" @if(old('uf')=='PE' ) selected @endif>PE</option>
                        <option value="PI" @if(old('uf')=='PI' ) selected @endif>PI</option>
                        <option value="RJ" @if(old('uf')=='RJ' ) selected @endif>RJ</option>
                        <option value="RN" @if(old('uf')=='RN' ) selected @endif>RN</option>
                        <option value="RS" @if(old('uf')=='RS' ) selected @endif>RS</option>
                        <option value="RO" @if(old('uf')=='RO' ) selected @endif>RO</option>
                        <option value="RR" @if(old('uf')=='RR' ) selected @endif>RR</option>
                        <option value="SC" @if(old('uf')=='SC' ) selected @endif>SC</option>
                        <option value="SP" @if(old('uf')=='SP' ) selected @endif>SP</option>
                        <option value="SE" @if(old('uf')=='SE' ) selected @endif>SE</option>
                        <option value="TO" @if(old('uf')=='TO' ) selected @endif>TO</option>
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