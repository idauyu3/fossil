<!doctype html>
<html lang="{{ str_replace("_", "-", app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Posts</title>
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
        <link rel="stylesheet" href="/css/app.css">
    </head>
    <body>
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
    </body>
</html>