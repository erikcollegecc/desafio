<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ProdutosResource extends JsonResource
{

    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'nome_produto' => $this->nome_produto,
            'descricao' => $this->descricao, 
            'breve_descricao' => $this->breve_descricao,
            'tipo_produto' => $this->tipo_produto,
            'ref' => $this->ref,
            'nome_atributos' => $this->nome_atributos,
            'atributos' => $this->atributos,
            'atributos_visivel' => $this->atributos_visivel,
            'image' => $this->image

        ];


    }
}
