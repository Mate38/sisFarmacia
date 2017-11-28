<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\User;

use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Auth;

class PersonalController extends Controller
{

    use RegistersUsers;

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $personal = User::find(Auth::user()->id);

        return view('personals.edit',['detailpage'=>$personal]);
    }

    public function edit()
    {
        $personal = User::find(Auth::user()->id);
    
        return view('personals.edit',['detailpage'=>$personal]);
    }

    public function update(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'email' => 'required',
            'password' => 'required',
        ]);
        
        $users = User::find(Auth::user()->id);
        $users->name = $request->name;
        $users->email = $request->email;
        $users->password = bcrypt($request->password);
        $users->save();
        return redirect('users')->with('message', 'Dados atualizados com sucesso!');
    }

}