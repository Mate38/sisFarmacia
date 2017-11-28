<?php

namespace App\Http\Controllers;

use App\Produto;

use App\Fornecedor;

use App\Http\Requests;
use Illuminate\Http\Request;

class ProdutoController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $produtos = Produto::orderBy('Nome', 'asc')->get();

        //$produtos = Produto::all();
        return view('produtos.index',[
            'produtos' => $produtos
            ]);
    }

    public function create()
    {
        $fornecedores = Fornecedor::all();
        return view('produtos.create', ['fornecedores' => $fornecedores]);
    }

    public function store(Request $request)
    {
       
        $this->validate($request, [
            'Nome' => 'required',
            'Valor' => 'required|numeric',
			'Classificacao' => 'required',
			'Unidade_comp' => 'required',
            'Quantidade_comp'=>'required|numeric',
            'Nome_generico'=>'required',
            'Fornecedor_idFornecedor'=>'required',
        ]);
        
        $produtos = new Produto;
        $produtos->nome = $request->Nome;
        $produtos->valor = $request->Valor;
        $produtos->descricao = $request->Descricao;
		$produtos->classificacao = $request->Classificacao;
		$produtos->unidade = $request->Unidade_comp;
		$produtos->quantidade = $request->Quantidade_comp;
        $produtos->nome_generico = $request->Nome_generico;
		$produtos->fornecedores_idfornecedores = $request->Fornecedor_idFornecedor;
        $produtos->save();
        return redirect('produtos')->with('message', 'Produto cadastrado com sucesso!');
        
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
            'Nome' => 'required',
            'Valor' => 'required',
            'Descricao'=>'required',
			'Classificacao' => 'required',
			'Unidade_comp' => 'required',
            'Quantidade_comp' => 'required',
            'Nome_generico' => 'required',
            'Fornecedor_idFornecedor' => 'required',
        ]);
    
        $produtos = Produto::find($id);
        $produtos->nome = $request->Nome;
        $produtos->valor = $request->Valor;
        $produtos->descricao = $request->Descricao;
		$produtos->classificacao = $request->Classificacao;
		$produtos->unidade = $request->Unidade_comp;
		$produtos->quantidade = $request->Quantidade_comp;
        $produtos->nome_generico = $request->Nome_generico;
        
		$produtos->fornecedores_idfornecedores = $request->Fornecedor_idFornecedor;
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