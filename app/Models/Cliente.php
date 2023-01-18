<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cliente extends Model
{
    use HasFactory;

    protected $table = 'clientes';

    protected $fillable = [
        'nome',
        'tp_documento',
        'documento',
        'id_municipio',
        'endereco',
        'bairro',
        'cep',
        'telefone',
        'email',
        'numero'


    ];

    public function municipio()
    {
        return $this->belongsTo(Municipio::class, 'id_municipio');
    }
}
