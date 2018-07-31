<?php

namespace App\Http\Controllers;

use App\Photos;
use App\Taglines;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Storage;
use Cornford\Googlmapper\Facades\MapperFacade as Mapper;

class PhotosController extends Controller
{
    public function home() {
        $tagline = Taglines::all()->random();
        $photos = Photos::all()->random(8)->shuffle();
        foreach ($photos as $photo) {
            $photo->url = Storage::url('img/'. $photo->pic . '_tn.jpg');
        }

        return view('test')->with([
            'photos' => $photos,
            'tagline' => $tagline
        ]);
    }

    public function show($slug) {
        $photo = Photos::where('slug', $slug)->first();

        $key = md5('s3-img'.$photo->slug);
        if (Cache::has( $key )) {
            $url = Cache::get( $key );
        } else {
            $url = Storage::url('img/'. $photo->pic . '_fs.jpg');
            Cache::put( $key, $url, 60 );
        }

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
