<?php

namespace Database\Seeders;

use App\Models\loja;
use Illuminate\Database\Seeder;

class LojaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        loja::create([
            'nomeLoja' => 'Loja Admin',
            'qtdEmail' => 1,
        ]);
    }
}
