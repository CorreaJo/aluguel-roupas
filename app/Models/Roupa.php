<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class roupa extends Model
{
    use HasFactory;

    protected $fillable = [
        'nome',
        'tamanho',
        'preco',
        'tipo',
    ];

    public function loja(){
        return $this->belongsTo(Loja::class);
    }
}
