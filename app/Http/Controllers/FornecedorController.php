<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Fornecedor;

class FornecedorController extends Controller
{
    public function index()
    {
        $dados = Fornecedor::all();
        return view('fornecedor.list', compact('dados'));
    }

    public function create()
    {
        return view('fornecedor.form');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nome' => 'required'
        ]);

        Fornecedor::create($request->all());

        return redirect('fornecedor')->with('success', 'Fornecedor cadastrado!');
    }

    public function edit($id)
    {
        $dado = Fornecedor::findOrFail($id);
        return view('fornecedor.form', compact('dado'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nome' => 'required'
        ]);

        Fornecedor::findOrFail($id)->update($request->all());

        return redirect('fornecedor')->with('success', 'Fornecedor atualizado!');
    }

    public function destroy($id)
    {
        Fornecedor::destroy($id);

        return redirect('fornecedor')->with('success', 'Fornecedor deletado!');
    }

    public function search(Request $request)
{
    $query = Fornecedor::query();

    if (!empty($request->valor)) {

        if ($request->tipo == 'nome') {
            $query->where('nome', 'like', '%' . $request->valor . '%');

        } elseif ($request->tipo == 'cnpj') {
            $query->where('cnpj', 'like', '%' . $request->valor . '%');

        } elseif ($request->tipo == 'telefone') {
            $query->where('telefone', 'like', '%' . $request->valor . '%');
        }
    }

    $dados = $query->get();

    return view('fornecedor.list', compact('dados'));
}
}