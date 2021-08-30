@extends('layouts.app')

@section('content')
    <body>
        <div class="container">    
            <div class="top-wrapper">
                <div class="container">
                    <h1>ランキング</h1>
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
    
            <div class="image container p-5" >
                @foreach($rankingPostLikes as $post)
                    <h2><a href="/posts/{{ $post->id }}">{{ $post->JapaneseName }}</a>
                        いいねの数　{{ $post->likes_count }} 
                    </h2>
                @endforeach
            </div>
            
            <div class='paginate'>
                {{ $rankingPostLikes->links() }}
            </div>
            
            <div class="footer">
                <a href="/">戻る</a>
            </div>
        </div>
    </body>
</html>

@endsection

<!-- Stlye -->
<style>

.top-wrapper {
    padding: 180px 0 100px 0;
    background-image: url(../../css/torikera.jpg);
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