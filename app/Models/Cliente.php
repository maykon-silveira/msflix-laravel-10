<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cliente extends Model
{
    use HasFactory;

    //indicar o banco de dados
    protected $table = 'clientes';

    //indicar as colunas 
    protected $fillable = ['nome', 'cpf', 'email', 'fone', 'nascimento'];
}
