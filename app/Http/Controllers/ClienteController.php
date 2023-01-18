<?php

namespace App\Http\Controllers;

use App\Models\Cliente;
use App\Models\Municipio;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Termwind\Components\Dd;

class ClienteController extends Controller
{
    public function index()
    {
        return view('clientes.index');
    }

    public function create()
    {
        $municipios = Municipio::all();
        return view('clientes.adicionar', compact('municipios'));
    }

    public function listar(Request $request)
    {
        $clientes = Cliente::where(function ($query) use ($request) {
            $query->where('id', $request->busca)
                ->orWhere('nome', 'like', '%' . $request->busca . '%')
                ->orWhere('documento', 'like', '%' . $request->busca . '%');
        })->with('municipio')
            ->select('clientes.*');
        $orders = [
            'id',
            'nome',
            '',
            '',
            '',
            '',
            'id_municipio',
            '',

        ];

        $clientes = $clientes->orderBy($orders[$request->order[0]['column']], $request->order[0]['dir'])
            ->paginate($request->length, ['*'], 'page', ($request->start / $request->length) + 1)
            ->toArray();

        return ["draw" => $request->draw, "recordsTotal" => (int) $clientes['to'], "recordsFiltered" => (int) $clientes['total'], "data" => $clientes["data"]];
    }

    public function store(Request $request)
    {

        DB::beginTransaction();

        try{
            Cliente::create([
                'nome' => $request->nome,
                'telefone' => $request->telefone,
                'email' => $request->email,
                'tp_documento' => $request->tp_documento,
                'documento' => $request->documento,
                'id_municipio' => $request->municipio,
                'endereco' => $request->endereco,
                'bairro' => $request->bairro,
                'cep' => $request->cep,
                'numero' => $request->numero,
            ]);

            DB::commit();
            return response()->json(['msg' => 'Cliente cadastrado com sucesso!'], 200);
        }catch(\Exception $e){
            DB::rollBack();
            return response()->json(['msg' => 'Erro ao cadastrar cliente!'], 500);
        }

    }

    public function verificaCpf(Request $request)
    {
        $cliente = Cliente::where('documento', $request->documento)->first();
        if ($cliente) {
            return response()->json(['msg' => 'Já existe um cliente cadastrado com esse documento'], 500);
        } else {
            return response()->json(['msg' => 'CPF disponível!'], 200);
        }
    }


}
