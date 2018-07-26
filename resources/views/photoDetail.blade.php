@extends('layouts.app')

@include('partials.nav')
<div class="header">
    <h1>{{ $photo->location }}</h1>
</div>

<div class="image_wrapper">
    <img class="detail_image"  src="/img/{{ $photo->pic }}">
</div>

<div class="caption_wrapper">
    <br>
    <span>{{ $photo->blurb }}</span>
    <br>
    <div class="flex-grid-thirds">
        @foreach ($tags as $tag)
        <div class="col tag-wrapper">
            <button class="tag-buttons"><a href="/tag/{{ $tag }}">#{{ $tag}}</a></button>
        </div>
        @endforeach
    </div>
    <br>
    <div class="flex-grid-thirds">
        <button class="external-button"><a class="external-link" target="_blank" href="{{ $photo->link }}">Read About This Place</a></button>
    </div>
</div>
