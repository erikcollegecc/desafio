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

    <h1>Produtos</h1><br>

                    @foreach ($produtos as $produto)
                        <p>
                            {{$produto->nome_produto}}
                            [
                                <a href="{{ route('produtos.show', $produto->id_p) }}">Ver</a> |
                                <a href="">Editar</a>
                            ]
                        </p>
                    @endforeach







@endsection