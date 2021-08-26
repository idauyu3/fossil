<!DOCTYPE HTML>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <title>Blog</title>
    </head>
    <body>
        <h1>Blog Name</h1>
        <form action="/posts" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="JapaneseName">
                <h2>Title</h2>
                <input type="text" name="post[JapaneseName]" placeholder="タイトル" value="{{ old('post.JapaneseName') }}"/>
                <p class="title_error" style="color:red">{{ $errors->first('post.JapaneseName') }}</p>
            </div>
            
            <div class="ScientificName">
                <h2>ScientificName</h2>
                <input type="text" name="post[ScientificName]" placeholder="タイトル" value="{{ old('post.ScientificName') }}"/>
                <p class="ScientificName_error" style="color:red">{{ $errors->first('post.ScientificName') }}</p>
            </div>
            
            <div class="comment">
                <h2>comment</h2>
                <textarea name="post[comment]" placeholder="今日も1日お疲れさまでした。">{{ old('post.comment') }}</textarea>
                <p class="title_error" style="color:red">{{ $errors->first('post.comment') }}</p>
            </div>
            
            <div class="image-group">
                <h2>image</h2>
                <input type="file" name="image[]" accept="image/png, image/jpeg" multiple>
            </div>

            <input type="submit" value="保存"/>
        </form>
        <div class="back">[<a href="/">back</a>]</div>
    </body>
</html>