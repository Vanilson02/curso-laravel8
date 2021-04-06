@if ($errors->any())
    <ul>
        @foreach ($errors as $error)
            <li>{{ $error }}</li>
        @endforeach
    </ul>
@endif

@csrf
<input type="file" name="image" id="image">
<input type="text" name="title" id="title" value="{{ $post->title ?? old('title') }}" placeholder="Titulo">
<textarea name="content" id="content" cols="30" rows="4" placeholder="Texto">{{ $post->content ?? old('content') }}</textarea>
<button type="submit">Enviar</button>