<?php

namespace App\Http\Controllers;

use App\Models\{
    loja,
    roupa
};
use Illuminate\Cache\RedisTaggedCache;
use Illuminate\Http\Request;

class RoupasController extends Controller
{
    public function index($lojaId){
        if(!$loja = loja::find($lojaId)){
            return redirect()->back();
        }

        $roupas = $loja->Roupas()->get();
        return view('loja.roupa.index', compact('loja', 'roupas'));
    }

    public function create($lojaId){
        if(!$loja = loja::find($lojaId)){
            return redirect()->back();
        }

        return view('loja.roupa.create', compact('loja'));
    }

    public function show($lojaId, $roupaId){
        if(!$loja = Loja::find($lojaId)){
            return redirect()->back();
        }
            
        if(!$roupa = roupa::find($roupaId)){
            return redirect()->back();
        }
            
        return view('loja.roupa.show', compact('loja', 'roupa'));
    }

    public function store($lojaId, Request $request){

        $request->validate([
            'nome' => ['string', 'required', 'max:255'],
            'codigo' => ['required', 'max:6'],
            'tipo' => ['required', 'string']
        ]);

        if(!$loja = loja::find($lojaId)){
            return redirect()->back();
        }

        $loja->roupas()->create($request->all());
        return redirect()->route('roupa.index', $loja->id);
    }

    public function delete($lojaId, $roupaId){
        if(!$loja = loja::find($lojaId)){
            return redirect()->back();
        }

        if(!$roupa = roupa::find($roupaId)){
            return redirect()->back();
        }

        $roupa->delete();
        return redirect()->route('roupa.index', $loja->id);
    }

    public function edit($lojaId, $roupaId){
        if(!$loja = loja::find($lojaId)){
            return redirect()->back();
        }

        if(!$roupa = roupa::find($roupaId)){
            return redirect()->back();
        }

        return view('loja.roupa.edit', compact('loja', 'roupa'));

    }

    public function update($lojaId, $roupaId, Request $request){
        if(!$loja = loja::find($lojaId)){
            return redirect()->back();
        }

        if(!$roupa = roupa::find($roupaId)){
            return redirect()->back();
        }

        $data = $request->only('nome', 'tipo', 'tamanho', 'preco');
        $roupa->update($data);
        
        return view('loja.roupa.show', compact('loja', 'roupa'));
    }

    public function pesquisa($lojaId, Request $request){
        if(!$loja = loja::find($lojaId)){
            return redirect()->back();
        }

        if($request->tipo_pesquisa === 'nome'){
            $roupas = roupa::where([
                ['nome','LIKE',"%{$request->pesquisa}%"],
                ['loja_Id', '=', "$lojaId"]
                ])->get();

            return view('pesquisa', compact('roupas'));
        }

        if($request->tipo_pesquisa === 'codigo'){
            $roupas = roupa::where([
                ['codigo','LIKE',"%{$request->pesquisa}%"],
                ['loja_Id', '=', "$lojaId"]
                ])->get();

            return view('pesquisa', compact('roupas'));
        }
    }
}
