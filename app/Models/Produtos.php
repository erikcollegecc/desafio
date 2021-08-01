<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\ProdSimples;

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
        'nome_atributos',
        'atributos',
        'atributos_visivel',
        'image',
    
    ];

    public function prodsimples() {
        return $this->hasOne(ProdSimples::class);
    }
}
