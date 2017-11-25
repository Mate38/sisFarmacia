<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\Fornecedor;

class FornecedorController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $fornecedores = Fornecedor::orderBy('Nome', 'asc')->get();
        //$fornecedores = Fornecedor::all();
        return view('fornecedores.index',['fornecedores' => $fornecedores]);
    }

    public function create()
    {
        return view('fornecedores.create');
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'Nome' => 'required',
            'CNPJ' => 'required',
            'Endereco' => 'required',
        ]);
        
        $fornecedores = new Fornecedor;
        $fornecedores->Nome = $request->Nome;
        $fornecedores->CNPJ = $request->CNPJ;
        $fornecedores->Endereco = $request->Endereco;
        $fornecedores->save();
        return redirect('fornecedores')->with('message', 'Fornecedor atualizado com sucesso!');
        
    }

    public function show($id)
    {
        $fornecedores = Fornecedor::find($id);

        return view('fornecedores.details')->with('detailpage', $fornecedores);        
    }

    public function edit($id)
    {
        $fornecedores = Fornecedor::find($id);
    
        return view('fornecedores.edit',['detailpage'=>$fornecedores]);
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'Nome' => 'required',
            'CNPJ' => 'required',
            'Endereco' => 'required',
        ]);
        
        $fornecedores = Fornecedor::find($id);
        $fornecedores->Nome = $request->Nome;
        $fornecedores->CNPJ = $request->CNPJ;
        $fornecedores->Endereco = $request->Endereco;
        $fornecedores->save();
        return redirect('fornecedores')->with('message', 'Fornecedor atualizado com sucesso!');
    }

    public function destroy($id)
    {
        
        $fornecedores = Fornecedor::find($id);
        $fornecedores->delete();
        return redirect('fornecedores');
    }
}
