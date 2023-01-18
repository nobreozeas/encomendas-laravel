<?php

namespace App\Http\Controllers;

use App\Models\Cliente;
use App\Models\Destinatario;
use App\Models\Encomenda;
use App\Models\FormaPagamento;
use App\Models\Municipio;
use App\Models\Remetente;
use App\Models\TipoFaturamento;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Termwind\Components\Dd;
use App\Helpers\Helper;
use App\Models\Agencia;
use App\Models\CancelamentoEncomenda;
use PDF;

class EncomendasController extends Controller
{


    public function index()
    {

        $agencias = Agencia::all();

        return view('encomendas.index', compact('agencias'));
    }

    public function create()
    {
        $formas_pagamentos = FormaPagamento::all();
        $tp_faturamentos = TipoFaturamento::all();
        $clientes = Cliente::all();
        $municipios = Municipio::all();
        return view('encomendas.adicionar', compact('clientes', 'municipios', 'formas_pagamentos', 'tp_faturamentos'));
    }

    public function buscaCliente(Request $request)
    {

        $cliente = Cliente::where('id',$request->cliente)->first();


        if (!$cliente) {
            return response()->json([
                'message' => 'Cliente não encontrado'
            ], 404);
        } else {
            return response()->json([
                'cliente' => $cliente
            ], 200);
        }
    }


    public function store(Request $request)
    {



        try {

            DB::beginTransaction();
            $valor = str_replace(',', '.', str_replace('.', '', $request->valor_pago));
            $codigo = rand(1000000000, 9999999999);
            $cliente = Cliente::where('documento', $request->documento)->first();
            if ($cliente) {
                $remetente = Remetente::create([
                    'id_cliente' => $cliente->id ?? null,
                    'nome' => $request->nome,
                    'telefone' => $request->telefone,
                    'email' => $request->email_remetente ?? null,
                    'tp_documento' => $request->tp_doc,
                    'documento' => $request->documento,
                ]);
            } else {
                $remetente = Remetente::create([
                    'nome' => $request->nome,
                    'telefone' => $request->telefone,
                    'email' => $request->email ?? null,
                    'tp_documento' => $request->tp_doc,
                    'documento' => $request->documento,
                ]);
            }
            $destinatario = Destinatario::create([
                'nome' => $request->nome_destinatario,
                'telefone' => $request->telefone_destinatario,
                'tp_documento' => $request->tp_doc_destinatario,
                'documento' => $request->documento_destinatario,
            ]);
            $encomenda = Encomenda::create([
                'id_remetente' => $remetente->id,
                'id_destinatario' => $destinatario->id,
                'id_origem' => $request->origem,
                'id_destino' => $request->destino,
                'id_tp_pagamento' => $request->forma_pagamento,
                'id_tp_faturamento' => $request->tp_faturamento,
                'descricao' => $request->descricao_encomenda,
                'quantidade' => $request->quantidade,
                'valor' => $valor,
                'status' => 1,
                'unidade' => $request->unidade,
                'observacao' => $request->observacao ?? null,
                'codigo_rastreio' => $codigo,
            ]);



            DB::commit();

            return response()->json([
                'encomenda' => $encomenda,
                'message' => 'Encomenda criada com sucesso'
            ], 200);
        } catch (\Exception $e) {
            DB::rollBack();
            return response()->json([
                'message' => $e->getMessage()
            ], 500);
        }
    }

    public function imprimir($id)
    {
        //imprimir
        $encomenda = Encomenda::findOrFail($id);

        $pdf = PDF::loadView('encomendas.imprimir', compact('encomenda'));
        PDF::setOption(['dpi' => 150, 'defaultFont' => 'sans-serif', 'isHtml5ParserEnabled' => true, 'isRemoteEnabled' => true]);
        return $pdf->setPaper('a4', 'portrait')->stream('comprovante.pdf');
    }

    public function listar(Request $request)
    {
        $encomendas = Encomenda::where(function ($query) use ($request) {
            $query->where('id', $request->busca)
                ->orWhere('codigo_rastreio', $request->busca)
                ->orWhere('descricao', 'like', '%' . $request->busca . '%');
        })
            ->with('hasOrigem')
            ->with('hasDestino')
            ->select('encomendas.*');

        if ($request->status) {
            $encomendas->where('status', $request->status);
        }
        if ($request->agencia) {
            $encomendas->where('id_agencia', $request->agencia);
        }
        $orders = [
            'id',
            'descricao',
            'valor',
            'id_origem',
            'id_destino',
            'status',
            ''

        ];

        $encomendas = $encomendas->orderBy($orders[$request->order[0]['column']], $request->order[0]['dir'])->paginate($request->length, ['*'], 'page', ($request->start / $request->length) + 1)->toArray();

        return ["draw" => $request->draw, "recordsTotal" => (int) $encomendas['to'], "recordsFiltered" => (int) $encomendas['total'], "data" => $encomendas["data"]];
    }

    public function atualizaStatus(Request $request)
    {
        if ($request->motivoCancelamento) {
            CancelamentoEncomenda::updateOrCreate(
                ['id_encomenda' => $request->id],
                [
                    'id_encomenda' => $request->id,
                    'motivo' => $request->motivoCancelamento,
                    'id_usuario' => 1,
                ]
            );

            Encomenda::where('id', $request->id)
                ->update(['status' => $request->status]);

            return response()->json([
                'message' => 'Status atualizado com sucesso'
            ], 200);

            return response()->json([
                'message' => 'Status atualizado com sucesso'
            ], 200);
        }

        Encomenda::where('id', $request->id)
            ->update(['status' => $request->status]);
        return response()->json([
            'message' => 'Status atualizado com sucesso'
        ], 200);
    }
}
