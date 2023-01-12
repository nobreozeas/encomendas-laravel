<?php

namespace Database\Seeders;

use App\Models\Agencia;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AgenciaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $agencias = [

                'nome' => 'Agência 1',
                'id_municipio' => '1',
                'endereco' => 'Rua 1',
                'bairro' => 'Bairro 1',
                'cep' => '00000-000',

        ];

        Agencia::create($agencias);

}

    }
