@extends('admin.layouts.app')

@section('title', 'Destalhes dos Produtos')

@section('content')

    <h1>Detalhes dos Produtos {{ $produto->nome_produto }}</h1>

    <ul>
        <li><strong>Produto: </strong>{{ $produto->nome_produto }}</li>
        <li><strong>Descrição: </strong>{{ $produto->descricao }}</li>
        <li><strong>Breve descrição: </strong>{{ $produto->breve_descricao }}</li>
        <li><strong>Referência: </strong>{{ $produto->ref }}</li>
        <li><strong>Atributos: </strong>{{ $produto->atributos }}</li>
        <li><strong>Imagem: </strong>{{ $produto->image }}</li>
    </ul>
    <br>
    <form action="{{route('produtos.destroy', $produto->id)}}" method="post">
        @csrf
        <input type="hidden" name="_method" value="DELETE">
        <button type="submit">Deletar produto: {{$produto->nome_produto}}</button>
    </form>




@endsection