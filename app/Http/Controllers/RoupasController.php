<?php

namespace App\Http\Controllers;

use App\Models\loja;
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

        return redirect()->route('roupa.create');
    }
}
