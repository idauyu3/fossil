    @foreach($images as $image)

    <img src="{{ Storage::url($image->image) }}">

    @endforeach
