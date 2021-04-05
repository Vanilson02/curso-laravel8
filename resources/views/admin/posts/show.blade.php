@extends('admin.layouts.app')

@section('title', "Detalhes do {$post->title}")

@section('content')

    <h1>Detalhes do Post - {{$post->title}}</h1>
    <ul>
        <li><strong> Titúlo: </strong> {{$post->title}}</li>
        <li><strong> Conteúdo: </strong> {{$post->content}}</li>
    </ul>

    <a href="{{ route('posts.index') }}">Voltar</a>

    
@endsection


