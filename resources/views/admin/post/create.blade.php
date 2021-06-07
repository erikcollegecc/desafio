@extends('admin.layouts.app')

@section('title', 'Cadastrar dos Posts')

@section('content')

    <h1>Cadatrar Novo Post</h1>

    <form action="{{ route('posts.store') }}" method="post">
        @include('admin.post._partials.form')
    </form>

@endsection