<?php

namespace Database\Seeders;

use App\Models\Usuario;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UsuariosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void {
        Usuario::create(['nome' => 'teste', 'email' => 'teste@teste.com', 'senha' => '123456']);
    }
}


