<?php

namespace Database\Seeders;

use App\Models\TipoFaturamento;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TipoFaturamentoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $tp_faturamentos = [
            'descricao' => 'Pago',
        ];

        TipoFaturamento::create($tp_faturamentos);
    }
}
