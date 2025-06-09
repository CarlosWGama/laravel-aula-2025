<?php

use App\Http\Controllers\LivrosController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::controller(LivrosController::class)
        ->name('livros.')
        ->prefix('livros')
        ->group(function() {
            Route::get('/', 'listar')->name('listar');
            Route::get('/novo', 'novo')->name('novo');
            Route::get('/editar/{id}', 'editar')->name('editar');
            Route::get('/visualizar/{id}', 'visualizar')->name('visualizar'); 
        });
