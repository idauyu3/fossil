@extends('layouts.app')

@section('content')

    
    <div class="container">
        <h1 align="center">化石</h1>
        
        <div align="right">
            <form action='/posts/search' method="GET" >
                @csrf
                <p><input type="text" name="keyword" value="{{request('keyword')}}"></p>
                <p><input type="submit" value="検索"></p>
            </form>
        </div>
        
        <div align="center">
            [<a href='/posts/create'>create</a>]
        
            <a href='/posts/ranking'>ranking</a>
        </div>
        
        <div class='posts'>
            @foreach ($posts as $post)
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
                                            <img class="d-block w-40" src="{{ Storage::url($image->path) }}">
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
            @endforeach
        </div>
         
        <div class='paginate'>
            {{ $posts->links() }}
        </div>
    </div>

@endsection

<!-- Styles -->
<style>
    h1 {
        color: #0000FF;
    }
    
    .carousel-control-prev {
        color: #0000FF;
    }

</style>

