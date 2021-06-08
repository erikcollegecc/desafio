@extends('admin.layouts.app')

@section('title', 'Cadastrar dos Posts')

@section('content')

<h1 class="text-center text-3x1 uppercase font-black my-4">Cadatrar novo Produto</h1>
    <div class="w-11/12 bg-white sm:w-8/12 md:w 1/2 mx-auto">

        <form action="{{route('produtos.store')}}" method="post">
            @csrf
            <input type="text" name="nome_produto" id="nome_produto" placeholder="Nome do produto"><br>
            <textarea name="descricao" id="descricao" cols="30" rows="1" placeholder="Descrição do produto"></textarea><br>
            <input type="text" name="breve_descricao" id="breve_descricao" placeholder="Coloque uma descrição breve"><br>
            <input type="text" name="tipo_produto" id="tipo_produto" placeholder="Tipo"><br>
            <input type="text" name="ref" id="ref" placeholder="Coloque a referência do estoque"><br>
            <textarea type="text" name="atributos" id="atributos" cols='30' rows="3" placeholder="Coloque as caracteristacas do produto e separe com |"></textarea><br>
            <input type="text" name="atributos_visivel" id="atributos_visivel" placeholder="Sim/Não"><br>
            <input type="text" name="variação" id="variação" placeholder="Sim/Não"><br>
            <input type="file" name="image" id="image"><br>
            <button type="submit">Cadastrar</button>

        </form>

    </div>

@endsection