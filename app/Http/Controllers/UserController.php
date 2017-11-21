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
        $this->middleware('auth');
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

        return view('users.edit')->with('detailpage', $users);
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6|confirmed',
        ]);
        
        $users = new User;
        $users->name = $request->nome;
        $users->email = $request->email;
        $users->password = $request->password;
        $users->save();
        return redirect('users')->with('message', 'Usuário atualizado com sucesso!');
    }

    public function destroy($id)
    {
        $users = User::find($id);
        $users->delete();
        return redirect('users');
    }
}