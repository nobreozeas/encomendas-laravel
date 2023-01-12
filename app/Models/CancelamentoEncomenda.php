<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CancelamentoEncomenda extends Model
{
    use HasFactory;

    protected $table = 'cancelamentos';

    protected $fillable = [
        'id_encomenda',
        'id_usuario',
        'motivo'
    ];


}
