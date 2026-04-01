<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Produto;
use App\Models\Categoria;

class ProdutoController extends Controller
{
    function index()
    {
        $dados = Produto::all();
        return view('produto.list', ['dados' => $dados]);
    }

    function create()
    {
        $categorias = Categoria::orderBy('nome')->get();
        return view('produto.form', ['categorias' => $categorias]);
    }

    function validateRequest(Request $request)
    {
        $request->validate([
            'nome' => 'required',
            'preco' => 'required',
            'categoria_id' => 'required',
            'imagem' => 'nullable|image|mimes:png,jpg,jpeg'
        ]);
    }

    function store(Request $request)
    {
        $this->validateRequest($request);

        $data = $request->all();
        $imagem = $request->file('imagem');

        if ($imagem) {
            $nome_imagem = date('YmdiHs') . "." . $imagem->getClientOriginalExtension();
            $diretorio = "imagem/produto/";

            $imagem->storeAs($diretorio, $nome_imagem, 'public');

            $data['imagem'] = $diretorio . $nome_imagem;
        }

        Produto::create($data);

        return redirect('produto')->with('success', 'Produto cadastrado com sucesso!');
    }

    function edit($id)
    {
        $dado = Produto::find($id);
        $categorias = Categoria::orderBy('nome')->get();

        return view('produto.form', [
            'dado' => $dado,
            'categorias' => $categorias
        ]);
    }

    function update(Request $request, $id)
    {
        $this->validateRequest($request);

        $data = $request->all();
        $imagem = $request->file('imagem');

        if ($imagem) {
            $nome_imagem = date('YmdiHs') . "." . $imagem->getClientOriginalExtension();
            $diretorio = "imagem/produto/";

            $imagem->storeAs($diretorio, $nome_imagem, 'public');

            $data['imagem'] = $diretorio . $nome_imagem;
        }

        Produto::find($id)->update($data);

        return redirect('produto')->with('success', 'Produto atualizado com sucesso!');
    }

    function destroy($id)
    {
        Produto::destroy($id);

        return redirect('produto')->with('success', 'Produto deletado com sucesso!');
    }

    function search(Request $request)
    {
        if (!empty($request->valor)) {
            $dados = Produto::where(
                $request->tipo,
                'like',
                '%' . $request->valor . '%'
            )->get();
        } else {
            $dados = Produto::all();
        }

        return view('produto.list', ['dados' => $dados]);
    }
}