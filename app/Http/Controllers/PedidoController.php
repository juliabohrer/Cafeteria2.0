<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pedido;
use App\Models\Produto;
use App\Models\Funcionario;

class PedidoController extends Controller
{
    function index()
    {
        $dados = Pedido::all();
        return view('pedido.list', ['dados' => $dados]);
    }

    function create()
    {
        $produtos = Produto::orderBy('nome')->get();
        $funcionarios = Funcionario::orderBy('nome')->get();

        return view('pedido.form', [
            'produtos' => $produtos,
            'funcionarios' => $funcionarios
        ]);
    }

    function validateRequest(Request $request)
    {
        $request->validate([
            'cliente' => 'required',
            'produto_id' => 'required',
            'funcionario_id' => 'required',
            'quantidade' => 'required'
        ]);
    }

    function store(Request $request)
    {
        $this->validateRequest($request);

        $produto = Produto::find($request->produto_id);

        $data = $request->all();
        $data['total'] = $produto->preco * $request->quantidade;

        Pedido::create($data);

        return redirect('pedido')->with('success', 'Pedido cadastrado com sucesso!');
    }

    function edit($id)
    {
        $dado = Pedido::find($id);
        $produtos = Produto::orderBy('nome')->get();
        $funcionarios = Funcionario::orderBy('nome')->get();

        return view('pedido.form', compact('dado','produtos','funcionarios'));
    }

    function update(Request $request, $id)
    {
        $this->validateRequest($request);

        $produto = Produto::find($request->produto_id);

        $data = $request->all();
        $data['total'] = $produto->preco * $request->quantidade;

        Pedido::find($id)->update($data);

        return redirect('pedido')->with('success', 'Pedido atualizado com sucesso!');
    }

    function destroy($id)
    {
        Pedido::destroy($id);

        return redirect('pedido')->with('success', 'Pedido deletado com sucesso!');
    }

    function search(Request $request)
    {
        if (!empty($request->valor)) {

            if ($request->tipo == 'funcionario') {
                $dados = Pedido::whereHas('funcionario', function ($query) use ($request) {
                    $query->where('nome', 'like', '%' . $request->valor . '%');
                })->get();

            } else {
                $dados = Pedido::where(
                    'cliente',
                    'like',
                    '%' . $request->valor . '%'
                )->get();
            }

        } else {
            $dados = Pedido::all();
        }

        return view('pedido.list', ['dados' => $dados]);
    }
}