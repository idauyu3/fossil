@extends('layouts.app')

@section('content')
    <body>
     <div class="da">   
        <div class="top-wrapper">
            <div class="container">
                <h1>検索結果</h1>
                <!-- to get an API token! -->
                <form class="form-subscribe" id="contactFrom" action='/posts/search' method="GET">
                    <!-- fossil_input -->
                    <div class="row">
                        <div class="col">
                            @csrf
                            <input class="form-control from-control-lg" id="keyword" type="text" placeholder="キーワードを入力してください" value="{{request('keyword')}}" />
                        </div>
                        <div class="col-auto"><button class="btn btn-primary btn-lg disabled" id="submitButton" type="submit">検索</button></div>
                    </div>
                </from>
            </div>
        </div>
        
        <div class='search' align="center">
            @foreach ($search_posts as $search_post)
                <div class='post p-3'>
                    <h3>{{ $search_post->user->name }}</h3>
                    <h3><a href="/posts/{{ $search_post->id }}">{{ $search_post->JapaneseName }}</a></h3>
                    <h3><a href="/posts/{{ $search_post->id }}">{{ $search_post->ScientificName }}</a></h3>
                    <p class='body'>{{ $search_post->comment }}</p>
                </div>
            @endforeach
            
           {{-- @foreach ($search_posts as $post)
                <div class='post'>
                    <h3>{{ $post->user->name }}</h3>
                    <h3><a href="/posts/{{ $post->id }}">{{ $post->JapaneseName }}</a></h3>
                    <h3><a href="/posts/{{ $post->id }}">{{ $post->ScientificName }}</a></h3>
                    <p class='body'>{{ $post->comment }}</p>
                    
                    <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
                        <ol class="carousel-indicators">
                            <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                            <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                            <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
                        </ol>
                        <div class="carousel-inner">
                                @foreach($post->images as $index => $image)
                                    @if ($index === 0)
                                        <div class="carousel-item active">
                                            <img class="d-block w-40 h-40" src="{{ Storage::url($image->path) }}">
                                        </div>
                                    @else
                                        <div class="carousel-item">
                                            <img class="d-block w-40 h-40" src="{{ Storage::url($image->path) }}">
                                        </div>
                                    @endif
                                @endforeach
                        </div>
                         <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            <span class="sr-only">Previous</span>
                        </a>
                        <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            <span class="sr-only">Next</span>
                        </a>
                    </div>

                </div>
            @endforeach--}}

        </div>
        
        <div class="footer">
            <a href="/">戻る</a>
        </div>
    </div>
        
        <!--<div class='paginate'>-->
        {{--{{ $search_posts->links() }}--}}
        <!--</div>-->
    </body>
</html>

@endsection

<!-- Stlye -->

<style>
    .da {
       
    }

    .top-wrapper {
    padding: 180px 0 100px 0;
    background-image: url(../../css/kyouryuu.jpg);
    background-size: cover;
    color: white;
    text-align: center;
}

.top-wrapper h1 {
  opacity: 0.7;
  font-size: 70px;
  letter-spacing: 5px;
}
</style>