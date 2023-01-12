<?php

use App\Http\Controllers\AgenciaController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\EncomendasController;
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
Route::get('/encomendas', [EncomendasController::class, 'index'])->name('encomendas.index');
Route::get('/encomendas/adicionar', [EncomendasController::class, 'create'])->name('encomendas.adicionar');
Route::post('/encomendas/buscar-cliente', [EncomendasController::class, 'buscaCliente'])->name('buscar_cliente');
Route::post('/encomendas/salvar', [EncomendasController::class, 'store'])->name('encomendas.salvar');
Route::get('/encomendas/imprimir/{id}', [EncomendasController::class, 'imprimir'])->name('encomendas.imprimir');
Route::post('/encomendas/listar', [EncomendasController::class, 'listar'])->name('encomendas.listar');
Route::post('/encomendas/atualiza-status', [EncomendasController::class, 'atualizaStatus'])->name('encomendas.atualiza_status');



//agencias

Route::get('/agencias', [AgenciaController::class, 'index'])->name('agencias.index');
Route::get('/agencias/adicionar', [AgenciaController::class, 'create'])->name('agencias.adicionar');
Route::post('/agencias/salvar', [AgenciaController::class, 'store'])->name('agencias.salvar');

//usuarios
Route::get('/usuarios', [UsuarioController::class, 'index'])->name('usuarios.index');

