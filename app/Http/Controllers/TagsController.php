<?php

namespace App\Http\Controllers;

use App\Photos;
use App\Tags;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class TagsController extends Controller
{
    public function index() {
        return view('tags')->with([
            'tags' => Tags::all()->pluck('name')
        ]);
    }

    public function show($tag) {
        $tag = Tags::where('name', $tag)->first();

        $photos = Photos::where('tags', 'like', '%' . $tag->name . '%')->get();

        foreach ($photos as $photo) {
            $photo->url = Photos::getPhotoUrl($photo, 'tn');
        }

        return view('taggedPhotos')->with([
            'photos' => $photos,
            'tagName' => $tag->name
        ]);

    }
}
