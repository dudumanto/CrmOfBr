<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cadastro extends Model
{
    use HasFactory;

    protected $fillable = [
        'cnpj',
        'status',
        'nome',
        'sobrenome',
        'email',
        'celular',
        'telefone',
        'oficina',
        'fantasia',
        'cargo',
        'ramo',
        'estado',
        'cidade',
    ];
}
