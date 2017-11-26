<?php

//Autores: Jean, Jeferson

namespace App\Http\Controllers;

use App\Cliente;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ClienteController extends Controller
{

        /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function transacao(Request $request, $idclientes){
        $cliente = Cliente::find($idclientes);

            if ($request->has('creditar')) {
                $saldo = $cliente->saldo;
                $saldo = $saldo + $request->input('valor');
            }else if ($request->has('debitar')) {
                $saldo = $cliente->saldo;
                $saldo = $saldo - $request->input('valor');
            }
            $cliente->saldo = $saldo;
            $cliente->save();

            if($cliente->save()){
                $request->session()->flash('message', 'Saldo atualizado');
            //echo 'Cliente salvo com sucesso';
            }else{
                $request->session()->flash('message', 'Houve um erro ao atualizar o saldo');
            //echo 'Houve um erro ao salvar';
            }
        return view('clientes/show')->with('cliente', $cliente);
    }


    public function index(){
        $clientes = Cliente::all();

        return view('clientes/index')->with('clientes', $clientes);
    }
    public function show($idclientes){
        $cliente = Cliente::find($idclientes);
        return view('clientes/show')->with('cliente', $cliente);
    }

    public function edit($idclientes){
        $cliente = Cliente::find($idclientes);

        return view('clientes/edit')->with('cliente', $cliente);
    }

    public function create(){
        $cliente = new Cliente();

        return view('clientes/create')->with('cliente', $cliente);

    }

    public function destroy(Request $request, $idclientes){
        $cliente = Cliente::find($idclientes);
       if($cliente->saldo == 0){
        if ($cliente -> delete()) {
                $request -> session() -> flash('message', 'Cliente Excluído');
            } else {
                $request -> session() -> flash('message', 'Houve falha ao excluir');
            }
       }else {
           $request -> session() -> flash('message', 'Cliente possui saldo, portanto não pode ser apagado!!!');
       }
        return redirect()->route('clientes.index');        
    }

    public function store(request $request){

        $validator = Validator::make($request->all(),[
            'nome'=>'required',
            'cpf'=>'required',
            'endereco'=>'required'
        ]);
        if($validator->fails()){
             return redirect()->back()->withErrors($validator);
        }

        $cliente = new cliente();
        $cliente -> nome = $request->input('nome');
        $cliente -> cpf = $request->input('cpf');
        $cliente -> endereco = $request->input('endereco');
        $cliente -> saldo = 0.00;


        if($cliente->save()){
            $request->session()->flash('message', 'Cliente cadastrado com sucesso');
            //echo 'Cliente salvo com sucesso';
        }else{
            $request->session()->flash('message', 'Houve um erro ao cadastrar o cliente');
            //echo 'Houve um erro ao salvar';
        }
        return redirect()->route('clientes.index');
    }

    public function update(request $request, $idclientes){

        $cliente = Cliente::find($idclientes);
        $cliente -> nome = $request->input('nome');
        $cliente -> cpf = $request->input('cpf');
        //$cliente -> telefone = $request->input('telefone');
        $cliente -> endereco = $request->input('endereco');
        $cliente -> saldo = $request->input('saldo');

        if($cliente->save()){
            $request->session()->flash('message', 'Cliente atualizado com sucesso');
        }else{
            $request->session()->flash('message', 'Houve um erro ao salvar');
        }
        return redirect('clientes');
    }

}
