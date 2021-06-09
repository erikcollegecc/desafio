@extends('admin.layouts.app')

@section('title', 'Cadastrar de produtos')

@section('content')

<h1 class="text-center text-3x1 uppercase font-black my-4">Cadatrar novo Produto</h1>

@if ($errors->any())
    <ul>
        @foreach ($errors->all() as $error)
            <li>{{ $error}}</li>
        @endforeach
    </ul>
@endif

    <div class="w-11/12 bg-white sm:w-8/12 md:w 1/2 mx-auto">

        <form action="{{route('produtos.store')}}" method="post">
            @csrf
            <input type="text" name="nome_produto" id="nome_produto" placeholder="Nome do produto" value="{{old('nome_produto')}}"><br>
            <textarea name="descricao" id="descricao" cols="30" rows="1" placeholder="Descrição do produto">{{old('descricao')}}</textarea><br>
            <input type="text" name="breve_descricao" id="breve_descricao" placeholder="Breve descrição"><br>
            <input type="text" name="ref" id="ref" placeholder="Referência de estoque"><br>

            <select name="tipo_produto" id="tipo_produto" class="form-control">
                <option value="{{('1')}}">Produto Simples</option>
                <option value="{{('2')}}">Grupo de Produtos</option>
                <option value="{{('3')}}">Produto Variavel</option>
            </select>

            <hr>
                
                Simples <br>
                <input type="text" name="" id="" placeholder="Preço R$" value="">
                <input type="text" name="" id="" placeholder="Preço promocional R$" value=""><br>

                <hr>

                Digital <br>
                <input type="text" name="" id="" placeholder="Nome do arquivo" value="">
                <input type="file" name="" id="">

                <hr>

                Grupo <br>
                <textarea name="" id="" cols="30" rows="5" placeholder="Pesquisar um produto"></textarea>

                <hr>

                Variavel <br>

                <hr>



            Atributos: <br>
            <input type="text" name="" id="">
            <textarea type="text" name="atributos" id="atributos" cols='30' rows="3" placeholder="Coloque as caracteristacas do produto e separe com |">{{old('atributos')}}</textarea>
            <input type="checkbox" name="atributos_visivel" id="atributo_visivel"><label for="">Visível na página de produto</label><br>
            <hr>
            <label for=""><strong>Imagem do produto: </strong></label><input type="file" name="image" id="image"><br>
            <hr>
            <button type="submit">Cadastrar</button>

        </form>

    </div>

@endsection