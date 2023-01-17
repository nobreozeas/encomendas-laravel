<?php

namespace App\Http\Controllers;

use App\Models\Agencia;
use App\Models\Permissao;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UsuarioController extends Controller
{
    public function index()
    {
        return view('usuarios.index');
    }

    public function listar(Request $request)
    {
        $usuarios = User::where(function($query) use ($request){
            $query->where('id', $request->busca)
                ->orWhere('nome', 'like', '%' . $request->busca . '%')
                ->orWhere('usuario', 'like', '%' . $request->busca . '%')
                ->orWhere('cpf', 'like', '%' . $request->busca . '%');
        })->with('hasAgencia', 'hasPermissao')
            ->select('users.*');
        $orders = [
            'id',
            'nome',
            'usuario',
            'cpf',
            '',
            '',
            'status',
            '',

        ];

        $usuarios = $usuarios->orderBy($orders[$request->order[0]['column']], $request->order[0]['dir'])
            ->paginate($request->length, ['*'], 'page', ($request->start / $request->length) + 1)
            ->toArray();

        return ["draw" => $request->draw, "recordsTotal" => (int) $usuarios['to'], "recordsFiltered" => (int) $usuarios['total'], "data" => $usuarios["data"]];
    }

    public function create()
    {
        $agencias = Agencia::all();
        $permissoes = Permissao::all();

        return view('usuarios.adicionar', compact('agencias', 'permissoes'));
    }

    public function store(Request $request)
    {

        try{
            DB::beginTransaction();

            $usuario = User::create([
                'nome' => $request->nome,
                'usuario' => $request->usuario,
                'senha' => Hash::make($request->senha),
                'email' => $request->email,
                'cpf' => $request->cpf,
                'telefone' => $request->telefone,
                'id_agencia' => $request->agencia,
                'id_permissao' => $request->tipo,
                'primeiro_acesso' => 1,
            ]);

            DB::commit();
            return response()->json([
                'msg' => 'Usuário cadastrado com sucesso!',
            ], 200);
        }catch(\Exception $e){

            $usuario = User::where('usuario', $request->usuario)
            ->orWhere('email', $request->email)
            ->orWhere('cpf', $request->cpf)->first();

            DB::rollBack();

            return response()->json([
                'usuario' => $usuario,
                'msg' => 'Usuário já cadastrado!',
            ], 400);


        }
    }

    public function verificaUsuario(Request $request)
    {
        $usuario = User::orWhere('usuario', $request->dado)
        ->orWhere('email', $request->dado)->orWhere('cpf', $request->dado)->first();

        if ($usuario) {
            return response()->json([
                'usuario' => $usuario,
                'situacao' => 'erro',
                'msg' => 'Usuário indisponível',
            ], 400);
        } else {
            return response()->json([
                'situacao' => 'sucesso',
                'msg' => 'Usuário disponível',

            ], 200);
        }




    }
}
