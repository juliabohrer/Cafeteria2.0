<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\ProdutoController;
use App\Http\Controllers\FuncionarioController;
use App\Http\Controllers\PedidoController;

Route::get('/', function () {
    return view('welcome');
});


Route::get('/produto', [ProdutoController::class, 'index'])->name('produto.index');
Route::get('/produto/create', [ProdutoController::class, 'create'])->name('produto.create');
Route::post('/produto', [ProdutoController::class, 'store'])->name('produto.store');
Route::get('/produto/edit/{id}', [ProdutoController::class, 'edit'])->name('produto.edit');
Route::put('/produto/update/{id}', [ProdutoController::class, 'update'])->name('produto.update');
Route::delete('/produto/{id}', [ProdutoController::class, 'destroy'])->name('produto.destroy');
Route::post('/produto/search', [ProdutoController::class, 'search'])->name('produto.search');


Route::get('/funcionario', [FuncionarioController::class, 'index'])->name('funcionario.index');
Route::get('/funcionario/create', [FuncionarioController::class, 'create'])->name('funcionario.create');
Route::post('/funcionario', [FuncionarioController::class, 'store'])->name('funcionario.store');
Route::get('/funcionario/edit/{id}', [FuncionarioController::class, 'edit'])->name('funcionario.edit');
Route::put('/funcionario/update/{id}', [FuncionarioController::class, 'update'])->name('funcionario.update');
Route::delete('/funcionario/{id}', [FuncionarioController::class, 'destroy'])->name('funcionario.destroy');
Route::post('/funcionario/search', [FuncionarioController::class, 'search'])->name('funcionario.search');



Route::get('/pedido', [PedidoController::class, 'index'])->name('pedido.index');
Route::get('/pedido/create', [PedidoController::class, 'create'])->name('pedido.create');
Route::post('/pedido', [PedidoController::class, 'store'])->name('pedido.store');
Route::get('/pedido/edit/{id}', [PedidoController::class, 'edit'])->name('pedido.edit');
Route::put('/pedido/update/{id}', [PedidoController::class, 'update'])->name('pedido.update');
Route::delete('/pedido/{id}', [PedidoController::class, 'destroy'])->name('pedido.destroy');
Route::post('/pedido/search', [PedidoController::class, 'search'])->name('pedido.search');


Route::get('/categoria', [CategoriaController::class, 'index'])->name('categoria.index');
Route::get('/categoria/create', [CategoriaController::class, 'create'])->name('categoria.create');
Route::post('/categoria', [CategoriaController::class, 'store'])->name('categoria.store');
Route::get('/categoria/edit/{id}', [CategoriaController::class, 'edit'])->name('categoria.edit');
Route::put('/categoria/update/{id}', [CategoriaController::class, 'update'])->name('categoria.update');
Route::delete('/categoria/{id}', [CategoriaController::class, 'destroy'])->name('categoria.destroy');
Route::post('/categoria/search', [CategoriaController::class, 'search'])->name('categoria.search');