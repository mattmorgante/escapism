@extends('layouts.app')

@section('content')

@include('partials.nav')

<div class="flex-grid-thirds">
@foreach ($tags as $tag)
    <div class="col tags">
        <a href="/tag/{{ $tag }}">
            <p>#{{ $tag}}</p>
        </a>
    </div>
@endforeach
</div>

@endsection
