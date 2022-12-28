<?php

namespace App\Http\Controllers;

use App\Models\{
    loja,
    roupa
};
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

    public function store(Request $request, $lojaId){
        if(!$loja = loja::find($lojaId)){
            return redirect()->back();
        }

        $data = $request->all();
        $data = roupa::create($data);
    }
}
