<?php

namespace App\Http\Controllers\Post;

use App\Models\Post;
use App\Http\Filters\PostFilter;
use App\Http\Controllers\BaseController;
use App\Http\Requests\Post\FilterRequest;
use App\Http\Resources\Post\PostResource;

class PostController extends BaseController
{
    public function index(FilterRequest $request)
    {

        $data = $request->validated();

        $page = $data['page'] ?? 1;
        $perPage = $date['per_page'] ?? 10;


        $filter = app()->make(PostFilter::class, ['queryParams' => array_filter($data)]);

  
        $posts = Post::filter($filter)->paginate($perPage, ['*'], 'page', $page);

        //return PostResource::collection($posts);
        return view('posts.index', compact('posts'));
    }


    public function show(Post $post)
    {
        // return new PostResource($post);
        return view('posts.show', compact('post'));
    }
}
