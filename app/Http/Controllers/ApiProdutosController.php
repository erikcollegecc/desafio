<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\ProdutosResource;
use App\Models\Produtos;

class ApiProdutosController extends Controller
{

    public function index()
    {
        $produtos = Produtos::paginate(15);
        return ProdutosResource::collection($produtos);
    }

    public function store(Request $request)
    {
        $produto = new Produtos;
        $produto->nome_produto = $request->input('nome_produto');
        $produto->descricao = $request->input('descricao');
        $produto->breve_descricao = $request->input('breve_descricao');
        $produto->tipo_produto = $request->input('tipo_produto');
        $produto->ref = $request->input('ref');
        $produto->nome_atributos = $request->input('nome_atributos');
        $produto->atributos = $request->input('atributos');
        $produto->atributos_visivel = $request->input('atributos_visivel');
        $produto->image = $request->input('image');

        if( $produto->save() ){
            return new ProdutosResource( $produto );
        }
    }

    public function show($id)
    {
        $produto = Produtos::findOrFail( $id );
        return new ProdutosResource( $produto );
    }

    public function update(Request $request, $id)
    {
        $produto = Produtos::findOrFail( $request->id );
        $produto->nome_produto = $request->input('nome_produto');
        $produto->descricao = $request->input('descricao');
    
        if( $produto->save() ){
          return new ProdutosResource( $produto );
        }  
    }

    public function destroy($id)
    {
        $produto = Produtos::findOrFail( $id );
        if( $produto->delete() ){
            return new ProdutosResource( $produto );
        }
    }
}
