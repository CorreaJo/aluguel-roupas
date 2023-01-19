<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class roupa extends Model
{
    use HasFactory;

    protected $fillable = [
        'nome',
        'codigo',
        'condicao',
        'tipo',
    ];

    public function loja(){
        return $this->belongsTo(Loja::class);
    }

    public function Alugar(){
        return $this->hasMany(Alugar::class);
    }
}
