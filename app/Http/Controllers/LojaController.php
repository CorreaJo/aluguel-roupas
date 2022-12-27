<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreCreateLoja;
use App\Models\loja;
use Illuminate\Http\Request;

class LojaController extends Controller
{
    public function index(){
        $lojas = loja::get();
        return view('loja.index', compact('lojas'));
    }

    public function create(){
        return view('loja.create');
    }

    public function store(StoreCreateLoja $request){
        $data = $request->all();
        $data = Loja::create($data);

        return redirect()->route('loja.show', $data->id);
    }

    public function show($id){
        if(!$loja = Loja::find($id))
            return redirect()->back();
        return view('loja.show', compact('loja'));
    }

    public function delete($id){
        if(!$loja = Loja::find($id))
            return redirect()->route('loja.index');

        $loja->delete();
        return redirect()->route('loja.index');
    }

    public function edit($id){
        if(!$loja = Loja::find($id))
            return redirect()->back();
        
        return view('loja.edit', compact('loja'));
    }

    public function update(StoreCreateLoja $request, $id){
        if(!$loja = Loja::find($id))
            return redirect()->route('loja.index');
        
        $data = $request->only('nomeLoja', 'qtdEmail');
            
        $loja->update($data);
        return redirect()->route('loja.index');
    }
}
