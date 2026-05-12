<?php

namespace App\Http\Controllers;

use App\Models\Entrega;
use App\Models\Pedido;
use Illuminate\Http\Request;

class EntregaController extends Controller
{
    
    public function index()
    {
        $dados = Entrega::with('pedido')->get();

        return view('entrega.list', compact('dados'));
    }

    
    public function create()
    {
        // só pedidos sem entrega (relação 1:1)
        $pedidos = Pedido::doesntHave('entrega')->get();

        return view('entrega.form', compact('pedidos'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'pedido_id' => 'required|unique:entregas,pedido_id',
            'endereco'  => 'required',
            'status'    => 'nullable',
        ]);

        Entrega::create([
            'pedido_id' => $request->pedido_id,
            'endereco'  => $request->endereco,
            'status'    => $request->status ?? 'pendente',
        ]);

        return redirect()->route('entrega.index')
            ->with('success', 'Entrega cadastrada com sucesso!');
    }

    public function edit($id)
    {
        $dado = Entrega::findOrFail($id);

        // permite selecionar pedidos sem entrega OU o atual
        $pedidos = Pedido::whereDoesntHave('entrega')
            ->orWhere('id', $dado->pedido_id)
            ->get();

        return view('entrega.form', compact('dado', 'pedidos'));
    }

    public function update(Request $request, $id)
    {
        $dado = Entrega::findOrFail($id);

        $request->validate([
            'pedido_id' => 'required|unique:entregas,pedido_id,' . $id,
            'endereco'  => 'required',
            'status'    => 'required',
        ]);

        $dado->update([
            'pedido_id' => $request->pedido_id,
            'endereco'  => $request->endereco,
            'status'    => $request->status,
        ]);

        return redirect()->route('entrega.index')
            ->with('success', 'Entrega atualizada com sucesso!');
    }

    public function destroy($id)
    {
        Entrega::findOrFail($id)->delete();

        return back()->with('success', 'Entrega removida!');
    }

    public function search(Request $request)
    {
        $query = Entrega::with('pedido');

        if (!empty($request->valor)) {

            if ($request->tipo == 'id') {
                $query->where('id', $request->valor);
            }

            elseif ($request->tipo == 'pedido') {
                $query->where('pedido_id', $request->valor);
            }

            elseif ($request->tipo == 'status') {
                $query->where('status', 'like', '%' . $request->valor . '%');
            }

            elseif ($request->tipo == 'endereco') {
                $query->where('endereco', 'like', '%' . $request->valor . '%');
            }
        }

        $dados = $query->get();

        return view('entrega.list', compact('dados'));
    }
}