<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Produto;
use App\Models\Categoria;
use App\Models\Fornecedor;

class ProdutoController extends Controller
{
    function index()
    {
        $dados = Produto::with([
            'categoria',
            'fornecedor'
        ])->get();

        return view('produto.list', [
            'dados' => $dados
        ]);
    }

    function create()
    {
        $categorias = Categoria::orderBy('nome')->get();

        $fornecedores = Fornecedor::orderBy('nome')->get();

        return view('produto.form', [
            'categorias' => $categorias,
            'fornecedores' => $fornecedores
        ]);
    }

    function validateRequest(Request $request)
    {
        $request->validate([
            'nome' => 'required',
            'preco' => 'required',
            'categoria_id' => 'required',
            'fornecedor_id' => 'required',
            'imagem' => 'nullable|image|mimes:png,jpg,jpeg'
        ]);
    }

    function store(Request $request)
    {
        $this->validateRequest($request);

        $data = $request->all();

        $imagem = $request->file('imagem');

        if ($imagem) {

            $nome_imagem =
                date('YmdiHs') .
                "." .
                $imagem->getClientOriginalExtension();

            $diretorio = "imagem/produto/";

            $imagem->storeAs(
                $diretorio,
                $nome_imagem,
                'public'
            );

            $data['imagem'] =
                $diretorio . $nome_imagem;
        }

        Produto::create($data);

        return redirect('produto')
            ->with(
                'success',
                'Produto cadastrado com sucesso!'
            );
    }

    function edit($id)
    {
        $dado = Produto::find($id);

        $categorias = Categoria::orderBy('nome')->get();

        $fornecedores = Fornecedor::orderBy('nome')->get();

        return view('produto.form', [
            'dado' => $dado,
            'categorias' => $categorias,
            'fornecedores' => $fornecedores
        ]);
    }

    function update(Request $request, $id)
    {
        $this->validateRequest($request);

        $data = $request->all();

        $imagem = $request->file('imagem');

        if ($imagem) {

            $nome_imagem =
                date('YmdiHs') .
                "." .
                $imagem->getClientOriginalExtension();

            $diretorio = "imagem/produto/";

            $imagem->storeAs(
                $diretorio,
                $nome_imagem,
                'public'
            );

            $data['imagem'] =
                $diretorio . $nome_imagem;
        }

        Produto::find($id)->update($data);

        return redirect('produto')
            ->with(
                'success',
                'Produto atualizado com sucesso!'
            );
    }

    function destroy($id)
    {
        Produto::destroy($id);

        return redirect('produto')
            ->with(
                'success',
                'Produto deletado com sucesso!'
            );
    }


    function search(Request $request)
    {
        $query = Produto::with([
            'categoria',
            'fornecedor'
        ]);

        if (!empty($request->valor)) {

            if ($request->tipo == 'nome') {

                $query->where(
                    'nome',
                    'like',
                    '%' . $request->valor . '%'
                );
            }

            elseif ($request->tipo == 'categoria') {

                $query->whereHas(
                    'categoria',
                    function ($q) use ($request) {

                        $q->where(
                            'nome',
                            'like',
                            '%' . $request->valor . '%'
                        );
                    }
                );
            }
        }

        $dados = $query->get();

        return view(
            'produto.list',
            compact('dados')
        );
    }
}