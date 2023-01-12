<?php

namespace App\Http\Controllers;

use App\Models\Agencia;
use App\Models\Municipio;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AgenciaController extends Controller
{
    public function index()
    {

        return view('agencias.index');
    }
    public function create()
    {
        $municipios = Municipio::all();
        return view('agencias.adicionar', compact('municipios'));
    }

    public function store(Request $request)
    {

        try{
            DB::beginTransaction();

            $agencia = Agencia::create([
                'nome' => $request->nome,
                'id_municipio' => $request->municipio,
                'endereco' => $request->endereco,
                'bairro' => $request->bairro,
                'cep' => $request->cep,
                'numero' => $request->numero,
                'telefone' => $request->telefone,
            ]);

            DB::commit();

            return response()->json([
                'msg' => 'Agencia cadastrada com sucesso',
                'code' => 200,

            ], 200);
        }catch(\Exception $e){
            DB::rollBack();

            return response()->json($e->getMessage());
        }







    }
}
