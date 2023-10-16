<?php

namespace App\Http\Controllers;

use App\Models\Cidade;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class CidadesController extends Controller
{
    //
    public function index(){
        //usaremos a model para buscar as cidades
        $listaCidades = DB::table('cidades') -> orderBy('nome','asc') -> get();
        $listaCidades = json_decode($listaCidades, true);
       
        $total = DB::table('cidades')->count();

        return view('cidades.index', ['cidades' => $listaCidades, 'total' => $total]);

    }

    public function create(){
        
        return view('cidades.create');
    }

    public function store(Request $request)
    {
        // dd($request->all());
        $request->validate([
            'nome' => 'required|min:2|max:80',
            'uf' => 'required'
        ]);

        Cidade::create([
            'nome' => $request->nome,
            'uf' => $request->uf,
        ]);

        return redirect('/cidades')->with('success', 'Cidade salva com sucesso');
    }

    public function edit($id)
    {
        //find é o método que faz select * from alunos where id= ?
        $cidade= Cidade::find($id);
        //retornamos a view passando a TUPLA de aluno consultado
        return view('cidades.edit', ['cidade' => $cidade]);
    }

    public function update(Request $request)
    {
        //find é o método que faz select * from alunos where id= ?
        $cidade = Cidade::find($request->id);
        
        $request->validate([
            'nome' => 'required|min:2|max:80',
            'uf' => 'required|min:2'
        ]);

        //método update faz um update aluno set nome = ?, idade=? ...
        $cidade->update([
            'nome' => $request->nome,
            'uf' => $request->uf,
        ]);
        return redirect('/cidades')->with('success', 'Cidade editada com sucesso');
    }

    public function destroy($id)
    {
        //select * from aluno where id = ?
        $cidade = Cidade::find($id);
        //deleta o aluno no banco
        $cidade->delete();
        return redirect('/cidades')->with('success', 'Cidade deletada com sucesso');;
    }
}
