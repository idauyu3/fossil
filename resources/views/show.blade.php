@extends('layouts.app')

@section('content')
    <body>
        <div align="center">
            <h1 class="JapaneseName">
                {{ $post->JapaneseName }}
            </h1>
            
            <h1 class="ScientificName">
                {{ $post->ScientificName }}
            </h1>
            
            <form action="/posts/{{ $post->id }}" id="form_{{ $post->id }}" method="post" style="display:inline">
                @csrf
                @method('DELETE')
                <button type="submit">delete</button>
            </form>
            <p class="edit">[<a href="/posts/{{ $post->id }}/edit">edit</a>]</p>
            
            <div>
                @if($post->is_like_by_auth_user())
                    <a href="{{ route('reply.unlike', ['id' => $post->id]) }}" class="btn btn-success btn-sm">いいね<span class="badge">{{ $post->likes->count() }}</span></a>
                @else
                    <a href="{{ route('reply.like', ['id' => $post->id]) }}" class="btn btn-secondary btn-sm">いいね<span class="badge">{{ $post->likes->count() }}</span></a>
                @endif
            </div>
            
            {{ $post->likes->count() }}
            
            <div class="content">
                <div class="content__post">
                    <p>{{ $post->comment }}</p>    
                </div>
            </div>
            
            
            <div class="image">
                @foreach($post->images as $image)
                    <img src="{{ Storage::url($image->path) }}">
                @endforeach
            </div>
            
            <div class="footer">
                <a href="/">戻る</a>
            </div>
        </div>
    </body>
</html>

@endsection