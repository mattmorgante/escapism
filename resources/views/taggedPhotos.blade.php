@extends('layouts.app')

@section('content')

@include('partials.nav')

<div class="header">
    <h1>#{{ $tagName }}</h1>
</div>

<div class="custom-flex-grid">
    @foreach ($photos as $photo)
    <div class="col">
        <a href="/places/{{$photo->slug}}">
            <img class="images"  src="{{ $photo->url }}"><br>
        </a>
    </div>
    @endforeach
</div>

@endsection
