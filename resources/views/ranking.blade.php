@extends('layouts.app')

@section('content')
    <body>
        <h1>ranking</h1>
        
        <form action='/posts/search' method="GET">
            @csrf
            <p><input type="text" name="keyword" value="{{request('keyword')}}"></p>
            <p><input type="submit" value="検索"></p>
        </form>
        
        <div class="image">
            @foreach($rankingPostLikes as $post)
                {{ $post->JapaneseName }} 
                {{ $post->likes_count }} 
            @endforeach
        </div>
        
        <div class='paginate'>
            {{ $rankingPostLikes->links() }}
        </div>
        
        <div class="footer">
            <a href="/">戻る</a>
        </div>

    </body>
</html>

@endsection