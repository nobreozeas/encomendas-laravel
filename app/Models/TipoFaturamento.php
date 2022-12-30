<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TipoFaturamento extends Model
{
    use HasFactory;

    protected $table = 'tp_faturamentos';
    protected $fillable = ['descricao'];
}
