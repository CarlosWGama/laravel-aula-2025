<?php

namespace App\Http\Controllers;

use App\Models\Livro;
use Illuminate\Http\Request;

class LivrosController extends Controller {
    
    /** 
     * Abre a tela que cadastra um livro 
     */
    public function novo() {
        $dados['livro'] = new Livro;
        return view('livros.cadastro', $dados);
    }

    /** 
     * Salva o livro a ser cadastrado 
     */
    public function cadastrar(Request $request) {

        //Valida
        $request->validate([
            'isbn'  => 'required|integer',
            'titulo'=> 'required',
            'autor' => 'required',
            'resumo'=> 'required',
            'capa'  => 'required|image'
        ]);

        $livro = Livro::create($request->all());

        //Faz upload de arquivo
        if ($request->has('capa')) {
            $nomeArquivo = 'livro_'.$livro->id.'.'.$request->capa->extension();
            $request->capa->storeAs('livros', $nomeArquivo, 'public');
            $livro->capa = $nomeArquivo;
            $livro->save();
        }


        return redirect()->route('livros.listar')->with('sucesso', 'Livro cadastrado com sucesso');

    }

    /** 
     * Abre a tela que lista os livros 
     */
    public function listar(Request $request) {

        //Só para criar a variavel que vamos montar a query sem nada ainda
        $livroModel = Livro::query();
        //adiciona a condição caso exista titulo
        if ($request->has('titulo'))
            $livroModel = $livroModel->where('titulo', 'like', '%'.$request->titulo.'%');
        
        $dados['livros'] = $livroModel->simplePaginate(2)->withQueryString();
        $dados['titulo'] = $request->titulo;
        return view('livros.listar', $dados);
    }

    /**
     * Abre a tela de edição de livros
     */
    public function edicao(int $id) {
        $dados['livro'] = Livro::find($id);
        return view('livros.edicao', $dados);
    }

    /**
     * Salva o livro a ser editado
     */
    public function editar(Request $request, int $id) {

        $request->validate([
            'isbn'  => 'required|integer',
            'titulo'=> 'required',
            'autor' => 'required',
            'resumo'=> 'required',
            'capa'  => 'image'
        ]);

        Livro::where('id', $id)->update($request->except('_token'));

        //Faz upload de arquivo
        if ($request->has('capa')) {
            $nomeArquivo = 'livro_'.$id.'.'.$request->capa->extension();
            $request->capa->storeAs('livros', $nomeArquivo, 'public');
            Livro::where('id', $id)->update(['capa' => $nomeArquivo]);
        }

        return redirect()->route('livros.listar')->with('sucesso', 'Livro atualizado com sucesso');
    }

    /**
     * Abre a tela de visualização de livros
     */
    public function visualizar(int $id) {
        $dados['livro'] = Livro::find($id);
        return view('livros.visualizar', $dados);
    }

    /**
     * Exclui um livro
     */
    public function excluir(int $id) {
        Livro::destroy($id);
        return redirect()->route('livros.listar')->with('sucesso', 'Livro excluído com sucesso');
    }
}
