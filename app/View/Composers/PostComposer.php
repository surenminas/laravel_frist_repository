<?php

namespace App\View\Composers;


use App\Models\Post;
use Illuminate\View\View;


class PostComposer
{
    public function __construct(
        protected Post $posts,
    ) {}
 
    /**
     * Bind data to the view.
     */
    public function compose(View $view): void
    {
        $view->with('PostCount', $this->posts->count());
    }
}
