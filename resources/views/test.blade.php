@extends('layouts.app')

@include('partials.nav')

<div class="header">
    <h1>{{ $tagline->tagline }}</h1>
</div>

<div class="flex-grid-thirds">
    @foreach ($photos as $photo)
        <div class="col">
            <a href="/places/{{$photo->slug}}">
                <img class="images"  src="{{ Storage::url('img/'. $photo->pic . '_tn.jpg') }}"><br>
            </a>
        </div>
    @endforeach
</div>

<div class="footer">
    <button class="external-button"><a class="external-link" href="/">Refresh</a></button>
</div>
