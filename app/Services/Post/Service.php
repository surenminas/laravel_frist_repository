<?php

namespace App\Services\Post;

use App\Models\Category;
use App\Models\Post;
use App\Models\Tag;
use Illuminate\Support\Facades\DB;

class Service
{
    /*
    |--------------------------------------------------------------------------
    | Store
    |--------------------------------------------------------------------------
    |
    */
    public function store($data)
    {
        try {
            Db::beginTransaction();

            // $tags = $data['tags'];
            $data['category_id'] = $data['category'];
            unset($data['tags'], $data['category']);


            // $tagIds = $this->getTagIds($tags);
            // dd($tagIds);
            // $data['category_id'] = $this->getCategoryId($category);

            $post = Post::create($data);
            // $post->tags()->attach($tagIds);

            Db::commit();
        } catch (\Throwable $th) {
            Db::rollBack();
            return $th->getMessage();
        }

        // return $post;
    }

    /*
    |--------------------------------------------------------------------------
    | Update
    |--------------------------------------------------------------------------
    |
    */
    public function update($post, $data)
    {

        try {
            Db::beginTransaction();
            $tags = $data['tags'];
            $category = $data['category_id'];
            unset($data['tags']);

            $tagIds = $this->getTagIdWithUpdate($tags);

            $post->update($data);
            $post->tags()->sync($tagIds);

            Db::commit();
        } catch (\Throwable $th) {

            Db::rollBack();
            return $th->getMessage();
        }
        return $post->fresh();
    }


    /*
    |--------------------------------------------------------------------------
    | Store function
    |--------------------------------------------------------------------------
    |
    */
    private function getTagIds($tags)
    {
        $tagIds = [];

        foreach ($tags as $tag) {

            $tag = !isset($tag['id']) ? Tag::create($tag) : Tag::find($tag['id']);
            $tagIds[] = $tag->id;
        }

        dd($tagIds);
        return $tagIds;
    }

    private function getCategoryId($item)
    {
        $category = !isset($item['id']) ? Category::create($item) : Category::find($item['id']);
        return $category;
    }

    /*
    |--------------------------------------------------------------------------
    | Update function
    |--------------------------------------------------------------------------
    |
    */

    private function getCategoryIdWithUpdate($item)
    {
        if (!isset($item['id'])) {
            $category = Category::create($item);
        } else {
            $currentCategory = Category::find($item['id']);
            $currentCategory->update($item);
            $category = $currentCategory->fresh();
        }
        return $category;
    }

    private function getTagIdWithUpdate($tags)
    {
        $tagIds = [];

        foreach ($tags as $tag) {
            if (!isset($tag['id'])) {
                $tag = Tag::create($tag);
            } else {
                $currentTag = Tag::find($tag['id']);
                $currentTag->update($tag);
                $tag = $currentTag->fresh();
            }
            //var_dump($tag->id);
            $tagIds[] = $tag->id;
        }
        return $tagIds;
    }
}
