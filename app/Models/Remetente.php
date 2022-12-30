<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Remetente extends Model
{
    use HasFactory;

    protected $fillable = [
        'nome',
        'id_cliente',
        'tp_documento',
        'documento',
        'email',
        'telefone',
    ];
}
