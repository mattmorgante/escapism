<title>{{ $photo->location }}</title>
@extends('layouts.app')

@section('content')
@include('partials.nav')
<div class="header">
    <h1>{{ $photo->location }}</h1>
</div>

<div class="image_wrapper">
        <img class="detail_image" src="{{ $url }}">
</div>



<div class="below-image">
    <div class="caption_wrapper">
        <div class="flex-grid-thirds">
            @foreach ($tags as $tag)
            <div class="tag-wrapper">
                <button class="tag-buttons"><a href="/tag/{{ $tag }}">#{{ $tag}}</a></button>
            </div>
            @endforeach
        </div>
        <br>
        <div class="flex-grid-thirds">
                <button class="external-button"><a class="external-link" target="_blank" href="{{ $photo->link }}">Read About This Place</a></button>
        </div>
    </div>

    <div class="google-map">
        {!! Mapper::render() !!}
    </div>
</div>


@if (count($nearby) != 0 )

<div class="header">
    <h2>Other Places Nearby</h2>
</div>

<div class="flex-grid-thirds">
    @foreach ($nearby as $photo)
    <div class="col">
        <a href="/places/{{$photo->pic}}">
            <img class="images"  src="/img/{{ $photo->thumbnail }}"><br>
        </a>
    </div>
    @endforeach
</div>
@endif

@endsection
