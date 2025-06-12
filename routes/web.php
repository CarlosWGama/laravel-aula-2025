<?php

use App\Http\Controllers\LivrosController;
use App\Http\Controllers\LoginController;
use App\Models\Categoria;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return redirect('/login');
});

Route::get('/teste', function() {
    Categoria::create(['categoria' => 'Terror']);
    Categoria::create(['categoria' => 'Drama']);
    Categoria::create(['categoria' => 'Romance']);
    Categoria::create(['categoria' => 'Ficção Científica']);
    Categoria::create(['categoria' => 'Pintura']);
    echo "[FINALIZADO]";
});

//ROTAS DE AUTENTICAÇÃO
Route::controller(LoginController::class)->group(function() {
    Route::get('/login', 'login')->name('login');
    Route::post('/logar', 'logar')->name('logar');
    Route::get('/logout', 'logout')->name('logout');
});


//APENAS ROTAS AUTENTICADAS
Route::middleware('auth')->group(function() {

    //ROTAS DE LIVROS
    Route::controller(LivrosController::class)
            ->name('livros.')
            ->prefix('livros')
            ->group(function() {
                Route::get('/', 'listar')->name('listar');
                Route::get('/novo', 'novo')->name('novo');
                Route::post('/cadastrar', 'cadastrar')->name('cadastrar');
                Route::get('/edicao/{id}', 'edicao')->name('edicao');
                Route::post('/editar/{id}', 'editar')->name('editar');
                Route::get('/visualizar/{id}', 'visualizar')->name('visualizar'); 
                Route::get('/excluir/{id}', 'excluir')->name('excluir');
            });    
});
