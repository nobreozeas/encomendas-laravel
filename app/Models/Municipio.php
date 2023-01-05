<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Municipio extends Model
{


    protected $primaryKey = 'id';
    protected $table = 'municipios';

    protected $fillable = [
        'nome',
        'uf'
    ];
}
