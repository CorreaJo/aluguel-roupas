<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name' => 'Joao',
            'email' => 'admin@admin.com',
            'password' => bcrypt('123456'),
            'funcao' => 'admin',
            'loja_id' => 1
        ]);
    }
}
