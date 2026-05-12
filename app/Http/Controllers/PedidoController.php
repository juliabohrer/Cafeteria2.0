<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Pedido;
use App\Models\Funcionario;
use App\Models\Produto;
use App\Models\ItemPedido;

use App\Charts\ProdutosMaisVendidos;
use App\Charts\PedidosPorFuncionario;

class PedidoController extends Controller
{
    public function index()
    {
        $dados = Pedido::with([
            'funcionario',
            'entrega',
            'itens.produto'
        ])->get();

        return view('pedido.list', compact('dados'));
    }

    public function create()
    {
        $funcionarios = Funcionario::orderBy('nome')->get();
        $produtos = Produto::orderBy('nome')->get();

        return view('pedido.form', compact(
            'funcionarios',
            'produtos'
        ));
    }

    public function store(Request $request)
    {
        $request->validate([

            'cliente' => 'required',
            'funcionario_id' => 'required',

            'itens' => 'required|array|min:1',
            'itens.*.produto_id' => 'required',
            'itens.*.quantidade' => 'required|numeric|min:1',
        ]);

        $pedido = Pedido::create([
            'cliente' => $request->cliente,
            'funcionario_id' => $request->funcionario_id,
            'total' => 0
        ]);

        $total = 0;

        foreach ($request->itens as $item) {

            $produto = Produto::findOrFail($item['produto_id']);

            $subtotal = $produto->preco * $item['quantidade'];

            ItemPedido::create([
                'pedido_id' => $pedido->id,
                'produto_id' => $produto->id,
                'quantidade' => $item['quantidade'],
                'valor_unitario' => $produto->preco,
                'subtotal' => $subtotal
            ]);

            $total += $subtotal;
        }

        $pedido->update([
            'total' => $total
        ]);

        return redirect('pedido')
            ->with('success', 'Pedido criado com sucesso!');
    }

    public function edit($id)
    {
        $dado = Pedido::with([
            'itens.produto',
            'entrega'
        ])->findOrFail($id);

        $funcionarios = Funcionario::orderBy('nome')->get();
        $produtos = Produto::orderBy('nome')->get();

        return view('pedido.form', compact(
            'dado',
            'funcionarios',
            'produtos'
        ));
    }

    public function update(Request $request, $id)
    {
        $request->validate([

            'cliente' => 'required',
            'funcionario_id' => 'required',

            'itens' => 'required|array|min:1',
            'itens.*.produto_id' => 'required',
            'itens.*.quantidade' => 'required|numeric|min:1',
        ]);

        $pedido = Pedido::findOrFail($id);

        $pedido->update([
            'cliente' => $request->cliente,
            'funcionario_id' => $request->funcionario_id,
        ]);

        $pedido->itens()->delete();

        $total = 0;

        foreach ($request->itens as $item) {

            $produto = Produto::findOrFail($item['produto_id']);

            $subtotal = $produto->preco * $item['quantidade'];

            ItemPedido::create([
                'pedido_id' => $pedido->id,
                'produto_id' => $produto->id,
                'quantidade' => $item['quantidade'],
                'valor_unitario' => $produto->preco,
                'subtotal' => $subtotal
            ]);

            $total += $subtotal;
        }

        $pedido->update([
            'total' => $total
        ]);


        return redirect('pedido')
            ->with('success', 'Pedido atualizado com sucesso!');
    }

    public function destroy($id)
    {
        $pedido = Pedido::findOrFail($id);

        $pedido->entrega()->delete();
        $pedido->itens()->delete();
        $pedido->delete();

        return redirect('pedido')
            ->with('success', 'Pedido removido!');
    }

    public function search(Request $request)
    {
        $query = Pedido::with([
            'funcionario',
            'entrega',
            'itens.produto'
        ]);

        if (!empty($request->valor)) {

            if ($request->tipo == 'cliente') {
                $query->where('cliente', 'like', '%' . $request->valor . '%');
            }

            elseif ($request->tipo == 'id') {
                $query->where('id', $request->valor);
            }
        }

        $dados = $query->get();

        return view('pedido.list', compact('dados'));
    }

    public function graficos(
        ProdutosMaisVendidos $chartProdutos,
        PedidosPorFuncionario $chartFuncionarios
    ) {
        $chartProdutos = $chartProdutos->build();
        $chartFuncionarios = $chartFuncionarios->build();

        return view('pedido.graficos', compact(
            'chartProdutos',
            'chartFuncionarios'
        ));
    }
}