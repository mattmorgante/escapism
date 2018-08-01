<?php

namespace App\Http\Controllers;

use App\Photos;
use App\Tags;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

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

        foreach ($photos as $photo) {
            $photo->url = Storage::url('img/'. $photo->pic . '_tn.jpg');
        }

        return view('taggedPhotos')->with([
            'photos' => $photos,
            'tagName' => $tag->name
        ]);

    }
}
