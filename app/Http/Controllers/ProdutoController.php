<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\Produto;

class ProdutoController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $produtos = Produto::orderBy('nome', 'asc')->get();
        //$produtos = Produto::all();
        return view('produtos.index',['produtos' => $produtos]);
    }

    public function create()
    {
        return view('produtos.create');
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'nome' => 'required',
            'valor' => 'required',
			'classificacao' => 'required',
			'unidade' => 'required',
        ]);
        
        $produtos = new Produto;
        $produtos->nome = $request->nome;
        $produtos->valorVenda = $request->valor;
        $produtos->descricao = $request->descricao;
		$produtos->classificacao = $request->classificao;
		$produtos->unidade_comp = $request->unidade_comp;
		$produtos->quantidade_comp = $request->quantidade_comp;
        $produtos->nome_generico = $request->nome_generico;
		$produtos->fornecedor_idfornecedor = $request->fornecedor_idfornecedor;
        $produtos->save();
        return redirect('produtos')->with('message', 'Produto atualizado com sucesso!');
        
    }

    public function show($id)
    {
        $produtos = Produto::find($id);

        return view('produtos.details')->with('detailpage', $produtos);        
    }

    public function edit($id)
    {
        $produtos = Produto::find($id);

        return view('produtos.edit')->with('detailpage', $produtos);
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'nome' => 'required',
            'valor' => 'required',
			'classificacao' => 'required',
			'unidade' => 'required',
        ]);
        
        $produtos = new Produto;
        $produtos->nome = $request->nome;
        $produtos->valorVenda = $request->valor;
        $produtos->descricao = $request->descricao;
		$produtos->classificacao = $request->classificao;
		$produtos->unidade_comp = $request->unidade_comp;
		$produtos->quantidade_comp = $request->quantidade_comp;
        $produtos->nome_generico = $request->nome_generico;
		$produtos->fornecedor_idfornecedor = $request->fornecedor_idfornecedor;
        $produtos->save();
        return redirect('produtos')->with('message', 'Produto atualizado com sucesso!');
    }

    public function destroy($id)
    {
        $produtos = Produto::find($id);
        $produtos->delete();
        return redirect('produtos');
    }
}