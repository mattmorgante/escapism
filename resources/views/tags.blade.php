@extends('layouts.app')

@section('content')

@include('partials.nav')

<div class="container">
    <div class="custom-flex-grid tags-wrapper">
    @foreach ($tags as $tag)
        <div class="col tags">
            <a href="/tag/{{ $tag }}">
                <p>#{{ $tag}}</p>
            </a>
        </div>
    @endforeach
    </div>
</div>
@endsection
