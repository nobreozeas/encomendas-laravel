<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Agencia extends Model
{
    use HasFactory;

    protected $table = 'agencias';

    protected $fillable = [
        'nome',
        'id_municipio',
        'endereco',
        'bairro',
        'cep',
        'numero',
        'telefone',
    ];

    public function hasMunicipio()
    {
        return $this->belongsTo(Municipio::class, 'id_municipio');
    }


}
