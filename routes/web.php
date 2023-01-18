<?php

use App\Http\Controllers\AgenciaController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ClienteController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\EncomendasController;
use App\Http\Controllers\UsuarioController;
use Illuminate\Support\Facades\Route;

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

Route::get('/', [AuthController::class, 'index'])->name('login');
Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard.home');

//encomendas
Route::prefix('encomendas')->group(function(){
    Route::get('/', [EncomendasController::class, 'index'])->name('encomendas.index');
    Route::get('/adicionar', [EncomendasController::class, 'create'])->name('encomendas.adicionar');
    Route::post('/buscar-cliente', [EncomendasController::class, 'buscaCliente'])->name('buscar_cliente');
    Route::post('/salvar', [EncomendasController::class, 'store'])->name('encomendas.salvar');
    Route::get('/imprimir/{id}', [EncomendasController::class, 'imprimir'])->name('encomendas.imprimir');
    Route::post('/listar', [EncomendasController::class, 'listar'])->name('encomendas.listar');
    Route::post('/atualiza-status', [EncomendasController::class, 'atualizaStatus'])->name('encomendas.atualiza_status');
});

//agencias

Route::prefix('agencias')->group(function () {
    Route::get('/', [AgenciaController::class, 'index'])->name('agencias.index');
    Route::get('/adicionar', [AgenciaController::class, 'create'])->name('agencias.adicionar');
    Route::post('/salvar', [AgenciaController::class, 'store'])->name('agencias.salvar');
    Route::post('/listar', [AgenciaController::class, 'listar'])->name('agencias.listar');
});


//usuarios
Route::prefix('usuarios')->group(function () {
    Route::get('/', [UsuarioController::class, 'index'])->name('usuarios.index');
    Route::get('/adicionar', [UsuarioController::class, 'create'])->name('usuarios.adicionar');
    Route::post('/salvar', [UsuarioController::class, 'store'])->name('usuarios.salvar');
    Route::post('/listar', [UsuarioController::class, 'listar'])->name('usuarios.listar');
    Route::post('/verifica-usuario', [UsuarioController::class, 'verificaUsuario'])->name('usuarios.verifica_usuario');
});


//clientes

Route::prefix('clientes')->group(function () {
    Route::get('/', [ClienteController::class, 'index'])->name('clientes.index');
    Route::get('/adicionar', [ClienteController::class, 'create'])->name('clientes.adicionar');
    Route::post('/salvar', [ClienteController::class, 'store'])->name('clientes.salvar');
    Route::post('/listar', [ClienteController::class, 'listar'])->name('clientes.listar');
    Route::post('/verifica-cpf', [ClienteController::class, 'verificaCpf'])->name('clientes.verifica_cpf');
});


