<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Encomenda extends Model
{
    protected $fillable = [
        'descricao',
        'unidade',
        'quantidade',
        'observacao',
        'valor',
        'status',
        'id_remetente',
        'id_destinatario',
        'id_origem',
        'id_destino',
        'id_tp_pagamento',
        'id_tp_faturamento',
        'codigo_rastreio',
        'id_agencia'
    ];

    public function hasOrigem()
    {
        return $this->hasOne(Municipio::class, 'id', 'id_origem');
    }

    public function hasDestino()
    {
        return $this->hasOne(Municipio::class, 'id', 'id_destino');
    }
}
