<?php

/**
 * Edição: Mateus Cardoso
 * 
 * E-mail: matecardoso38@gmail.com
 */

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

    public function edit($id)
    {
        $users = User::find($id);
    
        return view('users.edit',['detailpage'=>$users]);
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'name' => 'required',
            'email' => 'required',
            'password' => 'required',
            'nivel' => 'required',
        ]);
        
        $users = User::find($id);
        $users->name = $request->name;
        $users->email = $request->email;
        $users->password = bcrypt($request->password);
        $users->nivel = $request->nivel;
        $users->save();
        return redirect('users')->with('message', 'Usuário atualizado com sucesso!');
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
           $request -> session() -> flash('message', 'Usuário administrador não pode ser apagado!!!');
       }
        return redirect()->route('users.index');        
    }
}