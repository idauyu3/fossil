@extends('layouts.app')

@section('content')

    <div class="lesson-wrapper">
        <div class="container">
            <div class="lessons">
                <div class="lesson">
                    <a href="/posts/ {{ $post->id }}/edit" class="btn edit"><span class="e e-edit"></span>編集</a>
                    <form action="/posts/{{ $post->id }}" id="form_{{ $post->id }}" method="post" style="display:inline">
                        @csrf
                        @method('DELETE')
                        <button type="submit">delete</button>
                        <div>
                            @if($post->is_like_by_auth_user())
                                <a href="{{ route('reply.unlike', ['id' => $post->id]) }}" class="btn btn-success btn-sm">いいね<span class="badge">{{ $post->likes->count() }}</span></a>
                            @else
                                <a href="{{ route('reply.like', ['id' => $post->id]) }}" class="btn btn-secondary btn-sm">いいね<span class="badge">{{ $post->likes->count() }}</span></a>
                            @endif
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>





        <div align="center" class="container">
            <h1 class="JapaneseName">
                {{ $post->JapaneseName }}
            </h1>
            
            <h1 class="ScientificName">
                {{ $post->ScientificName }}
            </h1>
            
            <div class="content">
                <div class="content__post">
                    <p>{{ $post->comment }}</p>    
                </div>
            </div>
            
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
                                    <img class="d-block w-40 h-40" src="{{ $image->image_path }}">
                                </div>
                            @else
                                <div class="carousel-item">
                                    <img class="d-block w-40 h-40" src="{{ $image->image_path }}">
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

            
            <div class="footer">
                <a href="/">戻る</a>
            </div>
        </div>

@endsection

<!-- style -->
<style>

.edit {
    background-color: silver;
}

.lesson-wrapper {
    margin: 20px 0;
}

.lesson-wrapper p {
    margin: 10px 0;
}

.btn {
    padding: 8px 24px;
    color: white;
    display: inline-block;
    opacity: 0.8;
    border-radius: 4px;
}

.lesson {

    width: 25%;
}
</style>