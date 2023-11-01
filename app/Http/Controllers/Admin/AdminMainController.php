<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Post;


class AdminMainController extends Controller
{
    public function index()
    {
        // $this->authorize('view', auth()->user());
        // $this->authorize('view', User::class);
        // $postCount = Post::all();
        return view('admin.index');
    }
}
