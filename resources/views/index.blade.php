<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <title>Blog</title>
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
    </head>
    <body>
        <h1>Blog Name</h1>
        
        <form action='/posts/search' method="GET">
            @csrf
            <p><input type="text" name="keyword" value="{{request('keyword')}}"></p>
            <p><input type="submit" value="検索"></p>
        </form>
        
        [<a href='/posts/create'>create</a>]
        
        <div class='posts'>
            @foreach ($posts as $post)
                <div class='post'>
                    <h3>{{ $post->user->name }}</h3>
                    <h3><a href="/posts/{{ $post->id }}">{{ $post->JapaneseName }}</a></h3>
                    <h3><a href="/posts/{{ $post->id }}">{{ $post->ScientificName }}</a></h3>
                    <p class='body'>{{ $post->comment }}</p>
                    <div class="image">
            
                        <img src="{{ Storage::url( $post->image) }}">

                    </div>
                </div>
            @endforeach
        </div>
        
        <div class='paginate'>
            {{ $posts->links() }}
        </div>
    </body>
</html>