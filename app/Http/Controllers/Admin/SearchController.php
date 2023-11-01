<?php

namespace App\Http\Controllers\Admin;

use App\Models\Post;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Database\Eloquent\Builder;

class SearchController extends Controller
{
    public function query(Request $search)
    {
        $s = $search->s;
        // queries to Algolia search index and returns matched records as Eloquent Models 

        // $posts = Post::search($search->s)        
        // ->paginate(10);

        $posts = Post::query()
            ->select(['id', 'title', 'content'])
            ->when(request('s'), function (Builder $query) {
                $query->whereFullText('title', request('s'))->orWhereFullText('content', request('s'));
            })
            ->paginate(10);


        return view('admin.search', compact('posts'));
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
