<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Alugar extends Model
{
    use HasFactory;

    protected $fillable = [
        'nome',
        'telefone',
        'data',
        'idRoupa'
    ];


    public function roupa(){
        return $this->belongsTo(roupa::class);
    }
}
