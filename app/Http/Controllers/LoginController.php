<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller {
    
    /**
     * Abre a tela de login
     */ 
    public function login() {
        return view('login');
    }

    /**
     * Tenta realizar o login
     */
    public function logar(Request $request) {
        if (Auth::attempt(['email' => $request->email, 'password' => $request->senha])) {
            return redirect()->route('livros.listar');
        }
        return redirect()->back()->with('erro', 'Login ou senha incorreta');
    }

    /**
     * Realiza o logout
     */
    public function logout(Request $request) {
        Auth::logout();
        return view('login');
    }
}



// if (Auth::guard('admin')->attempt(['email' => 'teste@teste.com', 'password' => '123456', 'admin' => true]))  {
//     /* Tenta autenticar usuário como nivel admin */
// }
