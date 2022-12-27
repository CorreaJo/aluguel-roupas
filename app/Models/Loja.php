<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class loja extends Model
{
    use HasFactory;

    protected $fillable = [
        'nomeLoja',
        'qtdEmail',
    ];


    public function Roupas(){
        return $this->hasMany(Roupa::class);
    }
}
