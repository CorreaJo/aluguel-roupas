<?php

namespace App\Http\Controllers;

use App\Models\Alugar;
use App\Models\loja;
use App\Models\roupa;
use Carbon\Carbon;
use DateTimeZone;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

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

    public function show($idLoja, $idRoupa){
        if(!$roupa = roupa::find($idRoupa)){
            return redirect()->back();
        }

        if(!$loja = loja::find($idLoja)){
            return redirect()->back();
        }

        $alugueis = Alugar::where('roupa_id', '=', "$idRoupa")->get();

        $hoje = Carbon::now(new DateTimeZone('America/Sao_Paulo'));
        $perto = $hoje->subDays(5);
        $passou = $hoje->addDays(5);
        foreach ($alugueis as $aluguel){
            $dia = Carbon::parse($aluguel->data)->format('d');
            if($dia >= $perto->day && $dia <= $passou->day){    
                $condicao = "Alugado";
                roupa::where('id', $idRoupa)->update(['condicao' => $condicao]);
            } else if ($dia >= $passou->day){
                $condicao = "Liberado";
                roupa::where('id', $idRoupa)->update(['condicao' => $condicao]);
            }
        }

        

        return view('loja.roupa.aluguel.show', compact('roupa', 'loja', 'alugueis'));
    }

    public function delete($idLoja, $idRoupa, $idAluguel){
        if(!$roupa = roupa::find($idRoupa)){
            return redirect()->back();
        }

        if(!$loja = loja::find($idLoja)){
            return redirect()->back();
        }

        if(!$aluguel = Alugar::find($idAluguel)){
            return redirect()->back();
        }

        

        $aluguel->delete();
        $alugueis = Alugar::where('roupa_id', '=', "$idRoupa")->get();

        return view('loja.roupa.aluguel.show', compact('roupa', 'loja', 'alugueis'));
    }

}
