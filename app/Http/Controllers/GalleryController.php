<?php

namespace App\Http\Controllers;


use App\Models\Album;
use App\Models\Gallery;
use App\Http\Controllers\BaseController;

class GalleryController extends BaseController
{
    public function index()
    {
        // $galleries = Gallery::all();

        $albums = Album::all();
        return view('gallery', compact('albums'));
    }

    public function show()
    {

        dd(2222);
        // $galleries = Gallery::all();

        $albums = Album::all();
        return view('gallery', compact('albums'));
    }
}
