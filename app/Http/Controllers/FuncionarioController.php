<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Funcionario;

class FuncionarioController extends Controller
{

    function index()
    {
        $dados = Funcionario::all();
        return view('funcionario.list', ['dados' => $dados]);
    }

    function create()
    {
        return view('funcionario.form');
    }

    function validateRequest(Request $request)
    {
        $request->validate([
            'nome' => 'required',
            'cpf' => 'required',
            'endereco' => 'required',
            'horario' => 'required',
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
            $diretorio = "imagem/funcionario/";

            $imagem->storeAs($diretorio, $nome_imagem, 'public');

            $data['imagem'] = $diretorio . $nome_imagem;
        }

        Funcionario::create($data);

        return redirect('funcionario')->with('success', 'Funcionário cadastrado com sucesso!');
    }

    function edit($id)
    {
        $dado = Funcionario::find($id);

        return view('funcionario.form', ['dado' => $dado]);
    }

    function update(Request $request, $id)
    {
        $this->validateRequest($request);

        $data = $request->all();
        $imagem = $request->file('imagem');

        if ($imagem) {
            $nome_imagem = date('YmdiHs') . "." . $imagem->getClientOriginalExtension();
            $diretorio = "imagem/funcionario/";

            $imagem->storeAs($diretorio, $nome_imagem, 'public');

            $data['imagem'] = $diretorio . $nome_imagem;
        }

        Funcionario::find($id)->update($data);

        return redirect('funcionario')->with('success', 'Funcionário atualizado com sucesso!');
    }

    function destroy($id)
    {
        Funcionario::destroy($id);

        return redirect('funcionario')->with('success', 'Funcionário deletado com sucesso!');
    }

    function search(Request $request)
    {
        if (!empty($request->valor)) {

            if ($request->tipo == 'cpf') {
                $dados = Funcionario::where('cpf', $request->valor)->get();
            } else {
                $dados = Funcionario::where(
                    'nome',
                    'like',
                    '%' . $request->valor . '%'
                )->get();
            }

        } else {
            $dados = Funcionario::all();
        }

        return view('funcionario.list', ['dados' => $dados]);
    }
}