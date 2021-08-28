@extends('layouts.app')

@section('content')
    <body>
        <div class='search'>
            @foreach ($search_posts as $search_post)
                <div class='post'>
                    <h3>{{ $search_post->user->name }}</h3>
                    <h3><a href="/posts/{{ $search_post->id }}">{{ $search_post->JapaneseName }}</a></h3>
                    <h3><a href="/posts/{{ $search_post->id }}">{{ $search_post->ScientificName }}</a></h3>
                    <p class='body'>{{ $search_post->comment }}</p>
            
                </div>
            @endforeach
        </div>
        
        <div class="footer">
            <a href="/">戻る</a>
        </div>

        
        <!--<div class='paginate'>-->
        {{--{{ $search_posts->links() }}--}}
        <!--</div>-->
    </body>
</html>

@endsection