<?php

namespace App\Http\Controllers;

use App\Photos;
use App\Taglines;
use Cornford\Googlmapper\Facades\MapperFacade as Mapper;

class PhotosController extends Controller
{
    public function home() {
        $tagline = Taglines::all()->random();

        $photos = Photos::all()->random(8)->shuffle();
        foreach ($photos as $photo) {
            $photo->url = Photos::getPhotoUrl($photo, 'tn');
        }

        return view('home')->with([
            'photos' => $photos,
            'tagline' => $tagline
        ]);
    }

    public function show($slug) {
        $photo = Photos::where('slug', $slug)->first();

        $url = Photos::getPhotoUrl($photo, 'fs');
        $tags = str_replace(' ', '', explode(',', $photo->tags));
        $nearbyPhotos = Photos::getNearbyPhotos($photo);

        Mapper::map($photo->lat, $photo->long, ['zoom' => 5]);

        return view('photoDetail')->with([
            'photo' => $photo,
            'tags' => $tags,
            'nearbyPhotos' => $nearbyPhotos,
            'url' => $url
        ]);
    }

    public function map () {
        return view('map')->with([
            'photos' => Photos::all()
        ]);
    }

}
