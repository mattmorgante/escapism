@extends('layouts.app')

@section('content')

@include('partials.seo')

@include('partials.nav')

<div class="container">
    <div class="header">
        <h1>{{ $tagline->tagline }}</h1>
    </div>

    <div class="custom-flex-grid">
        @foreach ($photos as $photo)
            <div class="col">
                <a href="/places/{{$photo->slug}}">
                    <img class="images" src="{{ $photo->url }}">
                </a>
            </div>
        @endforeach
    </div>

    <div class="footer">
        <button class="external-button"><a class="external-link" onclick=refresh()>Refresh</a></button>
    </div>
</div>

<script type="text/javascript">
    function refresh () {
        window.location.href = '/?q=' + (new Date().getTime());
    }
</script>

@endsection
