@extends('admin.layouts.app')

@section('title', 'Cadastrar de produtos')

@section('content')

<h1 class="text-center text-3x1 uppercase font-black my-4">Cadatrar novo Produto</h1>

    <div class="w-11/12 bg-white sm:w-8/12 md:w 1/2 mx-auto">

        <form action="{{route('produtos.store')}}" method="post" enctype="multipart/form-data">
            
            @include('admin.produtos._partials.form')

        </form>

    </div>

@endsection