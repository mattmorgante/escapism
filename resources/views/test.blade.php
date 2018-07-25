@extends('layouts.app')

<div class="header">
    <h1>Escapism</h1>
</div>

<div class="flex-grid-thirds">
    @foreach ($photos as $photo)
        <div class="col">
            <img class="images"  src="/img/{{ $photo->thumbnail }}"><br>
        </div>
    @endforeach
</div>

<div class="footer">
    <button>Refresh</button>
</div>
