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

    <table style="border-collapse: collapse; width: 100%;" border="1">
        <tbody>
            <tr>
                <td style="width: 5%;">id</td>
                <td style="width: 20%;">Produto</td>
                <td style="width: 20%;">Refer&ecirc;ncia</td>
                <td style="width: 20%;">Preço</td>
                <td style="width: 10%;">Data</td>
                <td style="width: 7.5%;">Image</td>
                <td style="width: 7.5%;">Editar/Excluir</td>
            </tr>

            
            @foreach ($produtos as $produto)
                <tr>
                <p>
                        
                    <td style="width: 5%;">{{$produto->id}}</td>
                    <td style="width: 20%;">{{$produto->nome_produto}}</td>
                    <td style="width: 20%;">{{$produto->ref}}</td>
                    <td style="width: 20%;"></td>
                    <td style="width: 10%;">{{$produto->created_at}}</td>
                    <td style="width: 7.5%;">{{$produto->image}}</td>
                    <td style="width: 7.5%;">
                        <a href="{{ route('produtos.show', $produto->id) }}">Ver</a> |
                        <a href="{{ route('produtos.edit', $produto->id) }}">Editar</a>
                        <!-- <a href="">Excluir</a> -->
                    </td>
                </tr>

                </p>
            @endforeach

        </tbody>
    </table>

    <hr>

    @if (isset($filters))
        {{ $produtos->appends($filters)->links() }}
    @else
        {{ $produtos->links() }}
    @endif

    
@endsection