<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <title>Blog</title>
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
    </head>
    <body>
        <div class='search'>
            @foreach ($search_posts as $search_post)
                <div class='post'>
                    <h3>{{ $search_post->user->name }}</h3>
                    <h3><a href="/posts/{{ $search_post->id }}">{{ $search_post->JapaneseName }}</a></h3>
                    <h3><a href="/posts/{{ $search_post->id }}">{{ $search_post->ScientificName }}</a></h3>
                    <p class='body'>{{ $search_post->comment }}</p>
                    <div class="image">
            
                        <img src="{{ Storage::url( $search_post->image) }}">

                    </div>
                </div>
            @endforeach
        </div>
        
        <!--<div class='paginate'>-->
        {{--{{ $search_posts->links() }}--}}
        <!--</div>-->
    </body>
</html>