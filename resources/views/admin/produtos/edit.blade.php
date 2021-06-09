@extends('admin.layouts.app')

@section('title', 'Editar produto')

@section('content')

<h1 class="text-center text-3x1 uppercase font-black my-4">Editar produto <strong>{{$produto->nome_produto}}</strong></h1>
    <div class="w-11/12 bg-white sm:w-8/12 md:w 1/2 mx-auto">

        <form action="{{route('produtos.update', $produto->id)}}" method="post" enctype="multipart/form-data">

            @method('put')
            @include('admin.produtos._partials.form')

        </form>

    </div>

@endsection