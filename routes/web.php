<?php

use App\Http\Controllers\LivrosController;
use App\Http\Controllers\LoginController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/login', [LoginController::class, 'login']);

Route::controller(LivrosController::class)
        ->name('livros.')
        ->prefix('livros')
        ->group(function() {
            Route::get('/', 'listar')->name('listar');
            Route::get('/novo', 'novo')->name('novo');
            Route::get('/editar/{id}', 'editar')->name('editar');
            Route::get('/visualizar/{id}', 'visualizar')->name('visualizar'); 
        });
