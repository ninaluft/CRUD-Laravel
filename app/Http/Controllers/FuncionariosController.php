<?php

namespace App\Http\Controllers;

use App\Models\Funcionario;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;


class FuncionariosController extends Controller
{
    //
    public function index()
    {
        //usaremos a model para buscar os funcionarios
        //select * from funcionarios order by nome asc
        
        $listaFuncionarios = DB::table('funcionarios') -> orderBy('nome','asc') -> get();
        $listaFuncionarios = json_decode($listaFuncionarios, true);

        $total = DB::table('funcionarios')->count();

        return view('funcionarios.index', ['funcionarios' => $listaFuncionarios, 'total' => $total]);
    }

    public function create()
    {
        //alguma logica aqui
        return view('funcionarios.create');
    }

    public function store(Request $request)
    {
        // dd($request->all());
        $request->validate([
            'nome' => 'required|min:2|max:50',
            'cargo' => 'required|min:4|max:50',
            'email' => 'email:rfc,dns |unique:funcionarios',
            'salario' => 'required|min:3|max:12'
        ]);

        $valorSalario = str_replace('R$ ', '', $request->salario); // Remove o símbolo "R$"
        $valorSalario = str_replace('.', '', $valorSalario); // Remove os separadores de milhares (pontos)
        $valorSalario = str_replace(',', '.', $valorSalario); // Substitui o separador decimal (vírgula) por ponto
     

        Funcionario::create([            
            'nome' => $request->nome,
            'cargo' => $request->cargo,
            'email' => $request->email,
            'salario' => $valorSalario
        ]);

        return redirect('/funcionarios')->with('success', 'Funcionário salvo com sucesso');
    }

    public function edit($id)
    {
        //find é o método que faz select * from funcionarios where id= ?
        $funcionario = Funcionario::find($id);
        //retornamos a view passando a TUPLA de funcionario consultado
        return view('funcionarios.edit', ['funcionario' => $funcionario]);
    }

    public function update(Request $request)
    {
        //find é o método que faz select * from funcionarios where id= ?
        $funcionario = Funcionario::find($request->id);

        $request->validate([
            'nome' => 'required|min:2|max:50',
            'cargo' => 'required|min:4|max:50',
            'email' => 'email:rfc,dns',
            'salario' => 'required|min:3|max:12'
        ]);

        $valorSalario = str_replace('R$ ', '', $request->salario); // Remove o símbolo "R$"
        $valorSalario = str_replace('.', '', $valorSalario); // Remove os separadores de milhares (pontos)
        $valorSalario = str_replace(',', '.', $valorSalario); // Substitui o separador decimal (vírgula) por ponto

        //método update faz um update funcionario set nome = ?, idade=? ...
        $funcionario->update([
            'nome' => $request->nome,
            'cargo' => $request->cargo,
            'email' => $request->email,
            'salario' => $valorSalario
        ]);
         return redirect('/funcionarios')->with('success', 'Funcionário editado com sucesso');
    }

    public function destroy($id)
    {
        //select * from funcionario where id = ?
        $funcionario = Funcionario::find($id);
        //deleta o funcionario no banco
        $funcionario->delete();
        return redirect('/funcionarios')->with('success', 'Funcionário deletado com sucesso');
    }
}


