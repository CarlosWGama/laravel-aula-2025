<?php

use App\Http\Controllers\LivrosController;
use App\Http\Controllers\LoginController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return redirect('/login');
});

//ROTAS DE AUTENTICAÇÃO
Route::controller(LoginController::class)->group(function() {
    Route::get('/login', 'login')->name('login');
    Route::post('/logar', 'logar')->name('logar');
    Route::get('/logout', 'logout');
});

//ROTAS DE LIVROS
Route::controller(LivrosController::class)
        ->name('livros.')
        ->prefix('livros')
        ->group(function() {
            Route::get('/', 'listar')->name('listar');
            Route::get('/novo', 'novo')->name('novo');
            Route::get('/editar/{id}', 'editar')->name('editar');
            Route::get('/visualizar/{id}', 'visualizar')->name('visualizar'); 
            Route::get('/excluir/{id}', 'excluir')->name('excluir');
        });
