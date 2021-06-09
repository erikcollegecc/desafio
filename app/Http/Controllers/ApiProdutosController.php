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
        //return Produtos::all();
    }

    public function create()
    {
        
    }

    public function store(Request $request)
    {
        $produto = new Produtos;
        $produto->nome_produto = $request->input('nome_produto');
        $produto->descricao = $request->input('descricao');

        if( $produto->save() ){
            return new ProdutosResource( $produto );
        }
    }

    public function show($id)
    {
        $produto = Produtos::findOrFail( $id );
        return new ProdutosResource( $produto );
    }

    public function edit($id)
    {
        
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
