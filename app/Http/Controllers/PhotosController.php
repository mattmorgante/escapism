<?php

namespace App\Http\Controllers;

use App\Photos;
use App\Taglines;
use Illuminate\Http\Request;

class PhotosController extends Controller
{
    public function home() {
        $tagline = Taglines::all()->random();
        $photos = Photos::all()->random(8)->shuffle();

        return view('test')->with([
            'photos' => $photos,
            'tagline' => $tagline
        ]);
    }

    public function show($slug) {
        $photo = Photos::where('slug', $slug)->first();
        return view('photoDetail')->with([
            'photo' => $photo
        ]);
    }
}
