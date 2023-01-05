<?php

namespace Database\Seeders;

use App\Models\Cliente;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ClienteSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $clientes = [
            'nome' => 'João da Silva',
            'tp_documento' => 'CPF',
            'documento' => '123.456.789-00',
            'telefone' => '(11) 99999-9999',
            'endereco' => 'Rua das Flores',
            'bairro' => 'Centro',
            'cep' => '12345-678',
            'id_municipio' => 1,
        ];

        $cliente = Cliente::create($clientes);

    }
}
