<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\User;

use Illuminate\Foundation\Auth\RegistersUsers;

class UserController extends Controller
{

    use RegistersUsers;

    public function __construct()
    {
        $this->middleware('admin');
    }

    public function index()
    {
        $users = User::orderBy('name', 'asc')->get();

        return view('users.index',['users' => $users]);
    }

    public function create()
    {
        return view('users.create');
    }

    public function show($id)
    {
        $users = User::find($id);

        return view('users.details')->with('detailpage', $users);        
    }

    public function destroy(Request $request, $id){
        $user = User::find($id);
        if($user->id != 1){
            if ($user -> delete()) {
                $request -> session() -> flash('message', 'Usuário Excluído');
            } else {
                $request -> session() -> flash('message', 'Houve falha ao excluir');
            }
       }else {
           $request -> session() -> flash('message', 'Usuário administrador, portanto não pode ser apagado!!!');
       }
        return redirect()->route('users.index');        
    }
}