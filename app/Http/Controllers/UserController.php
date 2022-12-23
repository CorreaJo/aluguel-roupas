<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreUpdateUser;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index(){
        $users = User::get();
        return view('users.index', compact('users'));
    }

    public function show($id){
        if(!$user = User::find($id))
            return redirect()->back();
        return view('users.user', compact('user'));
    }

    public function create(){
        return view('users.create');
    }

    public function store(StoreUpdateUser $request){
        $data = $request->all();
        $data['password'] = bcrypt($request->password);
        $data = User::create($data);

        return redirect()->route('users.show', $data->id);
    }
}
