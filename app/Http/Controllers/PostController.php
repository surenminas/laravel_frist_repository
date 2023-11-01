<?php

namespace App\Http\Controllers;


use App\Http\Controllers\BaseController;
use App\Models\Post;

class PostController extends BaseController
{
    public function index()
    {
        return view('post.index');
    }

}
