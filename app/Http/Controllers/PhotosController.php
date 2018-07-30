<?php

namespace App\Http\Controllers;

use App\Photos;
use App\Taglines;
use Cornford\Googlmapper\Facades\MapperFacade as Mapper;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

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

        $url = Storage::url('img/'. $photo->pic . '_fs.jpg');

        $tags = explode(',', $photo->tags);
        $tags = str_replace(' ', '', $tags);

        Mapper::map($photo->lat, $photo->long, ['zoom' => 5]);

        $nearby = [];
        $nearby = Photos::whereBetween('lat', [$photo->lat - 5, $photo->lat + 5])->whereBetween('long',
            [$photo->long -5, $photo->long + 5])->where('slug', '!=', $slug)->get();

        return view('photoDetail')->with([
            'photo' => $photo,
            'tags' => $tags,
            'nearby' => $nearby,
            'url' => $url
        ]);
    }

    public function map () {
        $photos = Photos::all();

        return view('map')->with([
            'photos' => $photos
        ]);
    }

    public function test() {
        dd('something is working');
    }

}
