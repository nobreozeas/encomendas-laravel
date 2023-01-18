<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'nome',
        'usuario',
        'email',
        'senha',
        'cpf',
        'telefone',
        'id_agencia',
        'id_permissao',
        'status',
        'primeiro_acesso',

    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];


    public function hasAgencia()
    {
        return $this->belongsTo(Agencia::class, 'id_agencia');
    }

    public function hasPermissao()
    {
        return $this->belongsTo(Permissao::class, 'id_permissao');
    }
}
