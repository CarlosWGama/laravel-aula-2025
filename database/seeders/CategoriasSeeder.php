<?php

namespace Database\Seeders;

use App\Models\Categoria;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategoriasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Categoria::create(['categoria' => 'Terror']);
        Categoria::create(['categoria' => 'Drama']);
        Categoria::create(['categoria' => 'Romance']);
        Categoria::create(['categoria' => 'Ficção Científica']);
        Categoria::create(['categoria' => 'Pintura']);
    }
}
