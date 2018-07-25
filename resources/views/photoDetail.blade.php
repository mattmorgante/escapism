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
    <span>{{ $photo->tags }}</span>
    <br>
    <button><a target="_blank" href="{{ $photo->link }}">Read About This Place</a></button>
</div>

<span></span>

