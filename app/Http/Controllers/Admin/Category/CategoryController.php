<?php

namespace App\Http\Controllers\Admin\Category;

use App\Models\Tag;
use App\Models\Post;
use App\Models\Category;
use App\Http\Filters\PostFilter;
use App\Services\Category\Service;
use App\Http\Requests\Post\StoreRequest;
use App\Http\Requests\Post\FilterRequest;

use App\Http\Requests\Post\UpdateRequest;
use App\Http\Controllers\Admin\AdminBaseController;

class CategoryController extends AdminBaseController
{
    
    public function __construct(private Service $categoryService)
    {
        
    }

    public function index(FilterRequest $request)
    {
        $data = $request->validated();

        $filter = app()->make(PostFilter::class, ['queryParams' => array_filter($data)]);
  
        $posts = Post::filter($filter)->paginate(10);
        
        return view('admin.post.index', compact('posts'));
    }


    public function create()
    {
        $categories = Category::all();
        $tags = Tag::all();
        return view('admin.post.create', compact('categories', 'tags'));
    }

    public function store(StoreRequest $request)
    {
        $data = $request->validated();
        $this->categoryService->store($data);

        return redirect()->route('admin.post.index');
    }

    public function show(Post $post)
    {
        return view('admin.post.show', compact('post'));
    }

    public function edit(Post $post)
    {
        $categories = Category::all();
        $tags = Tag::all();
        return view('admin.post.edit', compact('post', 'categories', 'tags'));
    }

    public function update(UpdateRequest $request, Post $post)
    {
        
        $data = $request->validated();
        
        $this->categoryService->update($post, $data);

        return redirect()->route('admin.post.show', $post->id);
    }

    public function destroy(Post $post){

        $post->delete();
        return redirect()->route('admin.post.index');
    }


}
