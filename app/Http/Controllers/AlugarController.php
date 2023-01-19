<?php

namespace App\Http\Controllers;

use App\Models\Alugar;
use App\Models\loja;
use App\Models\roupa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AlugarController extends Controller
{
    public function store(Request $request, $idRoupa){
        $request->validate([
            'nome' => ['required', 'string'],
            'data' => ['required', 'date']
        ]);



        if(!$roupa = roupa::find($idRoupa)){
            return redirect()->back();
        }

        $novo = $roupa->alugar()->create($request->all());

        return redirect()->route('aluguel.show', array('id'=>Auth::user()->loja_Id, 'idRoupa'=> $roupa->id, 'idAluguel'=> $novo->id));
    }

    public function show($idLoja, $idRoupa, $idAluguel){
        if(!$roupa = roupa::find($idRoupa)){
            return redirect()->back();
        }

        if(!$loja = loja::find($idLoja)){
            return redirect()->back();
        }

        if(!$aluguel = Alugar::find($idAluguel)){
            return redirect()->back();
        }

        $roupa = roupa::find($idRoupa)->get();
        $loja = loja::find($idLoja)->get();
        $aluguel = Alugar::find($idAluguel)->get();
        

        return view('loja.roupa.aluguel.show', compact('roupa, loja, aluguel'));
    }
}
