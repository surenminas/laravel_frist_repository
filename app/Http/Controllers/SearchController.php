<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    public function query()
    {
        // queries to Algolia search index and returns matched records as Eloquent Models 
        $posts = Post::search('labore dolores ')->get();
        
        // dd($posts);
        // // do the usual stuff here 
        // foreach ($posts as $post) {
        //   // ... 
        // }


    }
    public function add()
    {
        // this post should be indexed at Algolia right away! 
        $post = new Post;
        $post->setAttribute('name', 'Another Post');
        $post->setAttribute('user_id', '1');
        $post->save();
    }
    
    public function delete()
    {
        // this post should be removed from the index at Algolia right away! 
        $post = Post::find(1);
        $post->delete();
    }
}
