<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <title>Blog</title>
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
    </head>
    <body>
        <h1 class="title">編集画面</h1>
        <div class="content">
            <form action="/posts/{{ $post->id }}" method="POST">
                @csrf
                @method('PUT')
                <div class='content_title'>
                    <h2>JapaneseName</h2>
                    <input type='text' name='post[JapaneseName]' value="{{ $post->JapaneseName }}">
                </div>
                <div class='content_title'>
                    <h2>ScientificName</h2>
                    <input type='text' name='post[ScientificName]' value="{{ $post->ScientificName }}">
                </div>
                <div class='content_body'>
                    <h2>Comment</h2>
                    <input type='text' name='post[comment]' value="{{ $post->comment }}">
                </div>
                <div class='content_title'>
                    <h2>image</h2>
                    <img src="{{ Storage::url( $post->image) }}">
                    <input type='file' name="image"><br>
                </div>
                <input type="submit" value="保存">
            </form>    
        </div>
    </body>
</html>