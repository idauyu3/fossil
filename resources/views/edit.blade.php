@extends('layouts.app')

@section('content')
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
        <div class="back">[<a href="/">back</a>]</div>
    </body>
</html>

@endsection