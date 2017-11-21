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
}