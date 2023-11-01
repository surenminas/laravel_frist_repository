<?php

namespace App\Http\Controllers\Admin\Album;


use App\Models\Album;
use App\Http\Requests\Album\StoreRequest;
use App\Http\Requests\Album\UpdateRequest;
use App\Http\Controllers\Admin\AdminBaseController;

class AlbumController extends AdminBaseController
{
    

    public function index()
    {
        $albums = Album::all();
        
        return view('admin.album.index', compact('albums'));
    }

    public function create()
    {
       
        return view('admin.album.create');
    }

    public function store(StoreRequest $request)
    {
        $data = $request->validated();

        Album::create($data);

        return redirect()->route('admin.album.index');
    }


    public function edit(Album $album)
    {
       
        return view('admin.album.edit', compact('album'));
    }

    public function update(UpdateRequest $request, Album $album)
    {

        $data = $request->validated();

        $album->updateOrCreate($data);


        return redirect()->route('admin.album.index');
    }

    public function destroy(Album $album)
    {
        $album->delete();
        return redirect()->route('admin.album.index');
    }
}
