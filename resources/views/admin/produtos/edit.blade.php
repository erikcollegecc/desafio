@extends('admin.layouts.app')

@section('title', 'Editar produto')

@section('content')

<h1 class="text-center text-3x1 uppercase font-black my-4">Cadatrar novo Produto <strong>{{$produto->nome_produto}}</strong></h1>
    <div class="w-11/12 bg-white sm:w-8/12 md:w 1/2 mx-auto">

        <form action="{{route('produtos.update', $produto->id)}}" method="post">
            @csrf
            @method('put')
            <input type="text" name="nome_produto" id="nome_produto" placeholder="Nome do produto" value="{{$produto->nome_produto}}"><br>
            <textarea name="descricao" id="descricao" cols="30" rows="1" placeholder="Descrição do produto">{{$produto->descricao}}</textarea><br>
            <input type="text" name="breve_descricao" id="breve_descricao" placeholder="Brevce descrição" value="{{$produto->breve_descricao}}"><br>
            <input type="text" name="tipo_produto" id="tipo_produto" placeholder="Tipo"><br>
            <input type="text" name="ref" id="ref" placeholder="Referência do estoque" value="{{$produto->ref}}"><br>
            <textarea type="text" name="atributos" id="atributos" cols='30' rows="3" placeholder="Coloque as caracteristacas do produto e separe com |">{{$produto->atributos}}</textarea><br>
            <input type="text" name="atributos_visivel" id="atributos_visivel" placeholder="Sim/Não"><br>
            <input type="text" name="variação" id="variação" placeholder="Sim/Não"><br>
            <input type="file" name="image" id="image" value="{{$produto->image}}"><br>
            <button type="submit">Salvar</button>

        </form>

    </div>

@endsection