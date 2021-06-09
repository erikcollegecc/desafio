@extends('admin.layouts.app')

@section('title', 'Listagem de produtos')

@section('content')

    <a href="{{route('produtos.create')}}">Cadastrar novo produto</a>
    <hr>

    @if (session('message'))
        <div>
            {{ session('message') }}
        </div>
    @endif

    <form action="{{ route('produtos.search') }}" method="post">
        @csrf
        <input type="text" name="search" placeholder="Filtar">
        <button type="submit">Filtrar</button>
    </form>

    <h1>Produtos</h1><br>

    @foreach ($produtos as $produto)
        <p>
            {{$produto->nome_produto}}
            [
                <a href="{{ route('produtos.show', $produto->id) }}">Ver</a> |
                <a href="{{ route('produtos.edit', $produto->id) }}">Editar</a> |
                <a href="">Excluir</a>
            ]
        </p>
    @endforeach

    <hr>

    @if (isset($filters))
        {{ $produtos->appends($filters)->links() }}
    @else
        {{ $produtos->links() }}
    @endif

    
@endsection