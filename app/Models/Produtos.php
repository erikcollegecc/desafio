<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Produtos extends Model
{
    use HasFactory;

    protected $table = 'produtos';

    protected $fillable = [
        'nome_produto', 
        'descricao', 
        'breve_descricao',
        'tipo_produto',
        'ref',
        'atributos',
        'atributos_visivel',
        'variação',
        'image',
    
    ];
}
