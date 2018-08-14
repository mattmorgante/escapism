<title>{{ $photo->location }}</title>
@extends('layouts.app')

@section('content')
@include('partials.nav')

<div class="container">
    <div class="header">
        <h1>{{ $photo->location }}</h1>
    </div>

    <div class="image_wrapper">
        <img class="detail_image" src="{{ $url }}">
    </div>
</div>

<div class="below-image-container">
    <div class="below-image">
        <div class="caption_wrapper">
            <div class="custom-flex-grid">
                @foreach ($tags as $tag)
                <div class="tag-wrapper">
                    <button class="tag-buttons"><a href="/tag/{{ $tag }}">#{{ $tag}}</a></button>
                </div>
                @endforeach
            </div>
            <br>
            <div class="custom-flex-grid">
                <button class="external-button"><a class="external-link" target="_blank" href="{{ $photo->link }}">Read About This Place</a></button>
            </div>
        </div>

        <div class="google-map">
            {!! Mapper::render() !!}
        </div>
    </div>
</div>


    @if (count($nearbyPhotos) != 0 )
<div class="container">
    <div class="header">
        <h2>Other Places Nearby</h2>
    </div>

    <div class="custom-flex-grid other-places">
        @foreach ($nearbyPhotos as $nearbyPhoto)
        <div class="col">
            <a href="/places/{{$nearbyPhoto->slug}}">
                <img class="images" src="{{ $nearbyPhoto->url }}"><br>
            </a>
        </div>
        @endforeach
    </div>
    @endif
</div>

@endsection
