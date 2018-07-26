<?php

namespace App\Http\Controllers;

use App\Photos;
use App\Tags;
use Illuminate\Http\Request;

class TagsController extends Controller
{
    public function index() {
        $tags = Tags::all()->pluck('name');
        return view('tags')->with([
            'tags' => $tags,
        ]);
    }

    public function show($tag) {
        $tag = Tags::where('name', $tag)->first();

        $photos = Photos::where('tags', 'like', '%' . $tag->name . '%')->get();

        return view('taggedPhotos')->with([
            'photos' => $photos,
            'tagName' => $tag->name
        ]);

    }
}
