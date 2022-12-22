<?php

namespace App\Http\Controllers;

use App\Models\Cliente;
use Illuminate\Http\Request;

class EncomendasController extends Controller
{
    public function index()
    {


        $encomendas = [
            [
                'id' => 1,
                'cliente' => 'João',
                'agencia' => 'Agência 1',
                'estado' => 'Pendente',
                'valor' => '1000',
                'data' => '2021-01-01',
            ],
            [
                'id' => 2,
                'cliente' => 'Maria',
                'agencia' => 'Agência 2',
                'estado' => 'Pendente',
                'valor' => '2000',
                'data' => '2021-01-01',
            ],
            [
                'id' => 3,
                'cliente' => 'José',
                'agencia' => 'Agência 3',
                'estado' => 'Pendente',
                'valor' => '3000',
                'data' => '2021-01-01',
            ]
        ];

       $encomendas =  (object) $encomendas;

        return view('encomendas.index', compact('encomendas'));
    }

    public function create()
    {
        $clientes = Cliente::all();
        return view('encomendas.adicionar', compact('clientes'));
    }

    public function buscaCliente(Request $request)
    {

        $cliente = Cliente::findOrFail($request->cliente)->first();


        if(!$cliente){
            return response()->json([
                'message' => 'Cliente não encontrado'
            ], 404);
        }else{
            return response()->json([
                'cliente' => $cliente
            ], 200);
        }




    }

}
