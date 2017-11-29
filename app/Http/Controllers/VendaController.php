<?php

/**
 * Autor: Mateus Cardoso
 * 
 * E-mail: matecardoso38@gmail.com
 */

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\Venda;
use App\Venda_Produto;
use App\Historico_Venda;
use App\Produto;
use App\Cliente;

class VendaController extends Controller {

    public function store(Request $request)
    {     
        $venda_produtos = Venda_Produto::all();

        if(!empty($request->clientes_id)){
            $valor_total = Venda_Produto::all()->sum('valorTotal');
            $cliente = Cliente::find($request->clientes_id);
            $cliente->saldo -= $valor_total;
            $cliente->save();
        }

        foreach($venda_produtos as $Venda_Produto){
            $historico_vendas = new Historico_Venda;
            $historico_vendas->quantidade = $Venda_Produto->quantidade;
            $historico_vendas->valorTotal = $Venda_Produto->valorTotal; 
            $historico_vendas->produtos_id = $Venda_Produto->produtos_id; 
            $historico_vendas->save();

            $produto = Produto::find($Venda_Produto->produtos_id);
            $produto->quantidade -= $Venda_Produto->quantidade;
            $produto->save();
            
            $Venda_Produto->delete();
        }
        return redirect('vendas')->with('message', 'Venda_Produto atualizado com sucesso!');      
    }

    public function prazo(Request $request)
    {     
        $clientes = Cliente::orderBy('nome', 'asc')->get();

        $valor_total = Venda_Produto::all()->sum('valorTotal');

        return view('vendas/prazo',['clientes' => $clientes, 'valor_total' => $valor_total]);      
    }

    public function destroy()
    {
        $venda_produtos = Venda_Produto::all();

        foreach($venda_produtos as $venda_produto){

            $venda_produto->delete();
            
        }
        return redirect('vendas')->with('message', 'Lista limpa!');
    }

}
