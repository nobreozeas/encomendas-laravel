<?php

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

Route::get('/', [DashboardController::class, 'index'])->name('dashboard.home');
Route::get('/encomendas', [EncomendasController::class, 'index'])->name('encomendas.index');
Route::get('/encomendas/adicionar', [EncomendasController::class, 'create'])->name('encomendas.adicionar');
Route::post('/encomendas/buscar-cliente', [EncomendasController::class, 'buscaCliente'])->name('buscar_cliente');
Route::post('/encomendas/salvar', [EncomendasController::class, 'store'])->name('encomendas.salvar');
Route::get('/encomendas/imprimir/{id}', [EncomendasController::class, 'imprimir'])->name('encomendas.imprimir');
