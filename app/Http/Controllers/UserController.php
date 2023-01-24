<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreUpdateUser;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{

    public function index(){
        return view('index');
    }

    public function indexUser(){
        $users = User::get();
        return view('users.index', compact('users'));
    }

    public function edit($id){
        if(!$user = User::find($id))
            return redirect()->back();
        
        return view('users.edit', compact('user'));
    }

    public function update(StoreUpdateUser $request, $id){
        if(!$user = User::find($id))
            return redirect()->route('users.index');
        
        $data = $request->only('name', 'email');
        if ($request->password)
            $data['password'] = bcrypt($request->password);
            
        $user->update($data);
        return redirect()->route('users.index');
    }

    public function delete($id){
        if(!$user = User::find($id))
            return redirect()->route('users.index');

        $user->delete();
        return redirect()->route('users.index');
    }

    public function pesquisa(Request $request){
        $pesquisa = $request->pesquisa;
        $users = User::where(function ($query) use ($pesquisa){
            if ($pesquisa){
                $query->where('email', $pesquisa);
                $query->orWhere('name', 'LIKE', "%{$pesquisa}%");
            }
        })->get();

        return view('users.pesquisa', compact('users'));
    }
}
