<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\GameController;
use App\Http\Controllers\ClienteController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::match(['get', 'post'], '/', [GameController::class, 'index'])->name('home');

Route::match(['get', 'post'], '/categoria/{idcategoria}', [GameController::class, 'categoria'])->name('categoria_por_id');

Route::match(['get', 'post'], '/categoria', [GameController::class, 'categoria'])->name('categoria');    

Route::match(['get', 'post'], '/cadastrar', [ClienteController::class, 'cadastrar']) ->name('cadastrar');

Route::match(['get', 'post'], '/cliente/cadastrar', [ClienteController::class, 'cadastrarCliente'])->name('cadastrar_cliente');

Route::match(['get', 'post'], '/{idproduto}/carrinho/adicionar', [GameController::class, 'adicionarCart'])->name('adicionar_carrinho');

Route::match(['get', 'post'], '/carrinho', [GameController::class, 'abrirCart'])->name('ver_carrinho');

Route::match(['get', 'post'], '{indice}/excluircarrinho', [GameController::class, 'retirarCart'])->name('carrinho_excluir');