@extends('layouts.app')

@section('content')

    <div class="container">
        
        {{--<div align="right">
            <form action='/posts/search' method="GET" >
                @csrf
                <p><input type="text" name="keyword" value="{{request('keyword')}}"></p>
                <p><input type="submit" value="検索"></p>
            </form>
        </div>--}}
        
        <!--Masthead-->
        <div class="top-wrapper">
            <div class="container">
                <h1>化石</h1>
                <!-- to get an API token! -->
                <form class="form-subscribe" id="contactFrom" action='/posts/search' method="POST">
                    <!-- fossil_input -->
                    <div class="row">
                        <div class="col">
                            @csrf
                            <input class="form-control from-control-lg" name="keyword" type="text" placeholder="キーワードを入力してください" value="{{request('keyword')}}" />
                        </div>
                        <div class="col-auto"><button class="btn btn-primary btn-lg disabled" id="submitButton" type="submit">検索</button></div>
                    </div>
                </from>
            </div>
        </div>
    
        <div class="lesson-wrapper">
            <div class="container">
                <div class="heading">
                    <h2>ようこそ　化石共有サイトへ</h2>
                </div>
                <div class="lessons">
                    <div class="lesson">
                        <div class="lesson-icon">
                            <img src="https://prog-8.com/images/html/advanced/html.png">
                            <p><a href='/posts/create'>投稿</a></p>
                        </div>
                    </div>
                    <div class="lesson">
                        <div class="lesson-icon">
                            <img src="https://prog-8.com/images/html/advanced/jQuery.png">
                            <p><a href='/posts/ranking'>ランキング</a></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class='posts' align="center">
            @foreach ($posts as $post)
                <div class='post p-5'>
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
                                            <img class="d-block w-40 h-40" src="{{ $image->image_path}}">
                                        </div>
                                    @else
                                        <div class="carousel-item">
                                            <img class="d-block w-40 h-40" src="{{ $image->image_path}}">
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
                    <h3>{{ $post->user->name }}</h3>
                    <h3><a href="/posts/{{ $post->id }}">{{ $post->JapaneseName }}</a></h3>
                    <h3><a href="/posts/{{ $post->id }}">{{ $post->ScientificName }}</a></h3>
                    <p class='body'>{{ $post->comment }}</p>
                </div>
            @endforeach
        </div>
         
        <div class='paginate'>
            {{ $posts->links() }}
        </div>
    </div>

@endsection

<!-- Styles -->
<style>

.top-wrapper {
    padding: 180px 0 100px 0;
    background-image: url(css/kyouryuu.jpg);
    background-size: cover;
    color: white;
    text-align: center;
}

.top-wrapper h1 {
  opacity: 0.7;
  font-size: 70px;
  letter-spacing: 5px;
}

.lesson-wrapper {
  height: 350px;
  padding-bottom: 80px;
  background-color: #f7f7f7;
  text-align: center;
}

.heading {
  padding-top: 60px;
  padding-bottom: 30px;
  color: #5f5d60;
}

.heading h2 {
  font-weight: normal;
}

.lesson {
  float: left;
  width: 50%;
}

.lesson-icon {
  position: relative;
}

.lesson-icon p {
  font-size: 30px;
  position: absolute;
  top: 90px;
  width: 100%;
  color: white;
}

</style>

