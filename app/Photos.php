<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Storage;

class Photos extends Model
{
    protected $table = 'photos';

    public static function getNearbyPhotos($photo) {
        $nearbyPhotos = Photos::whereBetween('lat', [$photo->lat - 6, $photo->lat + 6])->whereBetween('long',
            [$photo->long - 6, $photo->long + 6])->where('slug', '!=', $photo->slug)->get();

        foreach ($nearbyPhotos as $nearbyPhoto) {
            $nearbyPhoto->url = Storage::url('img/'. $nearbyPhoto->slug . '_tn.jpg');
        }

        return $nearbyPhotos;
    }

    public static function getPhotoUrl($photo, $size) {
        $key = md5('s3'.$photo->slug.$size);
        if (Cache::has( $key )) {
            $url = Cache::get( $key );
        } else {
            $url = Storage::url('img/'. $photo->slug . '_' . $size .'.jpg');
            Cache::put( $key, $url, 60 );
        }
        return $url;
    }
}
