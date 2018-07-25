<?php

namespace App\Http\Controllers;

use App\Photos;
use Illuminate\Http\Request;

class PhotosController extends Controller
{
    public function index() {
        $photos = Photos::all();
        dd($photos);
    }

    public function home() {
        $photos = Photos::all();
        return view('test')->with([
            'photos' => $photos
        ]);
    }
}
