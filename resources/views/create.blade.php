@extends('layouts.app')

@section('content')

    <div class="top-wrapper">
        <div class="container">
            <h1>投稿画面</h1>
            <form action="/posts" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="JapaneseName">
                    <h2>和名</h2>
                    <input type="text" name="post[JapaneseName]" placeholder="タイトル" value="{{ old('post.JapaneseName') }}"/>
                    <p class="title_error" style="color:red">{{ $errors->first('post.JapaneseName') }}
                </div>
                
                <div class="ScientificName">
                    <h2>学名</h2>
                    <input type="text" name="post[ScientificName]" placeholder="タイトル" value="{{ old('post.ScientificName') }}"/>
                    <p class="ScientificName_error" style="color:red">{{ $errors->first('post.ScientificName') }}</p>
                </div>

            <div class="comment">
                <h2>コメント</h2>
                <textarea name="post[comment]" placeholder="今日も1日お疲れさまでした。">{{ old('post.comment') }}</textarea>
                <p class="title_error" style="color:red">{{ $errors->first('post.comment') }}</p>
            </div>

            <div class="image-group">
                <h2>写真</h2>
                <input type="file" name="image[]" accept="image/png, image/jpeg" multiple>
            </div>

            <input type="submit" value="保存"/>
        </form>
        <div class="back">[<a href="/">back</a>]</div>

        </div>
    </div>

@endsection

<!-- style -->
<style>

.top-wrapper {
  padding: 180px 0 100px 0;
  background-image: url(../../css/torikera.jpg);
  color: white;
  background-color: aqua;
  background-size: cover;
  text-align: center;
}
    
.top-wrapper h1 {
  opacity: 0.7;
  font-size: 45px;
  letter-spacing: 5px;
  margin-bottom: 75px;
}


</style>