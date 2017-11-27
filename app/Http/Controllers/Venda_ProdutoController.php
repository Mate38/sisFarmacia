<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\Venda_Produto;
use App\Produto;

class Venda_ProdutoController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $venda_produtos = Venda_Produto::all();
        $produtos = Produto::orderBy('nome', 'asc')->get();

        return view('venda_produtos.index',['venda_produtos' => $venda_produtos, 'produtos' => $produtos]);
    }

    public function create()
    {
        $venda_produtos = Venda_Produto::all();
        $produtos = Produto::orderBy('nome', 'asc')->get();

        $valor_total = Venda_Produto::all()->sum('valorTotal');

        return view('venda_produtos.create',['venda_produtos' => $venda_produtos, 'produtos' => $produtos, 'valor_total' => $valor_total]);
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'quantidade' => 'required',
            'produtos_id' => 'required',
        ]);
        
        $venda_produtos = new Venda_Produto;
        $venda_produtos->quantidade = $request->quantidade;
        $venda_produtos->valorTotal = $request->quantidade * Produto::find($request->produtos_id)->valor;
        $venda_produtos->produtos_id = $request->produtos_id;
        $venda_produtos->save();
        return redirect('vendas')->with('message', 'Venda_Produto atualizado com sucesso!');      
    }

    public function show($id)
    {
        $venda_produtos = Venda_Produto::find($id);

        return view('venda_produtos.details')->with('detailpage', $venda_produtos);        
    }

    public function edit($id)
    {
        $venda_produtos = Venda_Produto::find($id);

        return view('venda_produtos.edit')->with('detailpage', $venda_produtos);
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'quantidade' => 'required',
            'produtos_id' => 'required',
        ]);
        
        $venda_produtos = Venda_Produto::find($id);
        $venda_produtos->quantidade = $request->quantidade;
        $venda_produtos->produtos_id = $request->produtos_id;
        $venda_produtos->save();
        return redirect('venda_produtos')->with('message', 'Venda_Produto atualizado com sucesso!');
    }

    public function destroy($id)
    {
        $venda_produtos = Venda_Produto::find($id);
        $venda_produtos->delete();
        return redirect('vendas');
    }
}