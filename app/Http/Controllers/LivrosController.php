<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LivrosController extends Controller
{ 
    public function novo() { echo 'Novo'; }
    public function editar(int $id) { echo 'Editar'; }
    public function listar() { echo 'Listar'; }
    public function visualizar(int $id) { echo 'Visualizar'; }
}


