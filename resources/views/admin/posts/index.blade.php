@extends('admin.layouts.app')

@section('title', 'Listagem dos Posts')
    
@section('content')
    <a href="{{ route('posts.create') }}">Criar novo Post</a>

    @if (session('message'))
        <div>{{session('message')}}</div>
    @endif

    <hr>
    <form action="{{ route('posts.search') }}" method="post">
        @csrf
        <input type="text" name="search" id="search">
        <button type="submit">Buscar</button>
    </form>
    <h1>Posts</h1>
    @foreach ($posts as $post)
        <p>
            
            {{$post->title}}
            
            <img src="{{ url("storage/{$post->image}") }}" alt="{{ $post->title }}" style="max-width:100px;">

            [ <a href="{{ route('posts.show', $post->id )}}">Ver </a> ]
            [ <a href="{{ route('posts.edit', $post->id )}}">editar </a> ]

            <form action="{{ route('posts.destroy', $post->id)}}" method="post">
                @csrf
                @method('delete')
                <button type="submit">Deletar {{$post->title}}</button>
            </form>

        </p>
    @endforeach

    <hr>

    @if (isset($filters))
        {{ $posts->appends($filters)->links() }}
    @else
        {{ $posts->links() }}
    @endif

@endsection