
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
        [ <a href="{{ route('posts.show', $post->id )}}">Ver </a> ]
    </p>
@endforeach

<hr>

@if (isset($filters))
    {{ $posts->appends($filters)->links() }}
@else
    {{ $posts->links() }}
@endif
