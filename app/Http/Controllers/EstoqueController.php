<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\Estoque;
use App\Produto;

class EstoqueController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        
        $estoques = Estoque::orderBy('idestoques', 'asc')->get();
        $produtos = Produto::orderBy('nome', 'asc')->get();
        return view('estoques.index',['estoques' => $estoques],['produtos' => $produtos]);
    }

    public function create()
    {
        $produtos = Produto::orderBy('nome', 'asc')->get();
        return view('estoques.create',['produtos' => $produtos]);
    }

    public function store(Request $request)
    {

        $this->validate($request, [
            'Produtos_idProdutos' => 'required',       
        ]);

        $estoques = new Estoque;
        $estoques->Quantidade = $request->Quantidade;
        $estoques->Data_chegada = $request->Data_chegada;
        $estoques->Data_vencimento = $request->Data_vencimento;
		$estoques->Data_fabricacao = $request->Data_fabricacao;
        $estoques->Lote_produto = $request->Lote_produto;
		$estoques->Produtos_idProdutos = $request->Produtos_idProdutos;
       
        $estoques->save();

        $produto = Produto::find($request->Produtos_idProdutos);
        $produto->Quantidade += $request->Quantidade;
        $produto->save();

        return redirect('estoques')->with('message', 'Estoque atualizado com sucesso!');
    }

    public function show($id)
    {
        $estoques = Estoque::find($id);

        return view('estoques.details')->with('detailpage', $estoques);        
    }

    public function edit($id)
    {
        $estoques = Estoque::find($id);

        return view('estoques.edit')->with('detailpage', $estoques);
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'fornecedores_id' => 'required',
        ]);
        
        $estoques = Estoque::find($id);
		$estoques->quantidade = $request->quantidade;
        $estoques->data_chegada = $request->data_chegada;
        $estoques->data_vencimento = $request->data_vencimento;
		$estoques->data_fabricacao = $request->data_fabricacao;
		$estoques->lote_produto = $request->lote_produto;
		$estoques->produtos_idprodutos = $request->produtos_idprodutos;
        $estoques->save();
        return redirect('estoques')->with('message', 'Estoque atualizado com sucesso!');
    }

    public function destroy($id)
    {
        $estoques = Estoque::find($id);
        $estoques->delete();
        return redirect('estoques');
    }
}