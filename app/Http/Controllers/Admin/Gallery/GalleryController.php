<?php

namespace App\Http\Controllers\Admin\Gallery;


use App\Models\Album;
use App\Models\Gallery;
use Illuminate\Support\Facades\Storage;

use App\Http\Requests\Gallery\StoreRequest;
use App\Http\Requests\Gallery\UpdateRequest;
use App\Http\Controllers\Admin\AdminBaseController;

class GalleryController extends AdminBaseController
{


    public function index()
    {
        $galleries = Gallery::all();


        return view('admin.gallery.index', compact('galleries'));
    }

    public function create()
    {
        $albums = Album::all();
        return view('admin.gallery.create', compact('albums'));
    }

    public function store(StoreRequest $request)
    {
        $data = $request->validated();

        $data['img_puth'] = $data['image'];

        unset($data['image']);


        $data['img_puth'] = Storage::disk('public')->put('/image', $data['img_puth']);

        Gallery::create($data);


        return redirect()->route('admin.gallery.index');
    }


    public function edit(Gallery $gallery)
    {

        $albums = Album::all();
        return view('admin.gallery.edit', compact('gallery', 'albums'));
    }

    public function update(UpdateRequest $request, Gallery $gallery)
    {

        $data = $request->validated();

        $data['album_id'] = $data['album'];
        
        unset($data['album']);


        dd($data);
        $gallery->update($data);


        return redirect()->route('admin.gallery.index');
    }

    public function destroy(Gallery $gallery)
    {
        $gallery->delete();
        return redirect()->route('admin.gallery.index');
    }
}
