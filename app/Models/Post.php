<?php

namespace App\Models;

use App\Models\Category;
use Laravel\Scout\Searchable;
use App\Models\Traits\Filterable;
use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\SoftDeletes;
use Laravel\Scout\Attributes\SearchUsingFullText;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Post extends Model
{
    use HasFactory, Filterable, SoftDeletes, Searchable, Sluggable;

    protected $table = "posts";
    protected $guarded = false;

    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class, 'category_id', 'id');
    }

    public function tags()
    {
        return $this->belongsToMany(Tag::class, 'post_tags', 'post_id', 'tag_id');
    }

    #[SearchUsingFullText(['title', 'content'])]

    public function toSearchableArray(): array
    {
        return [
            'title' => $this->title,
            'content' => $this->content,
        ];
    }

    /**
     * Return the sluggable configuration array for this model.
     *
     * @return array
     */
    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'title'
            ]
        ];
    }

    /**
     * Get the route key for the model.
     *
     * @return string
     */
    public function getRouteKeyName(): string
    {
        return 'slug';
    }



    // protected $dates = [
    //     'created_at',
    //     'updated_at'
    // ];

    // /** 
    //  * Get the indexable data array for the model. 
    //  * 
    //  * @return array 
    //  */
    // public function toSearchableArray()
    // {
    //     $array = $this->toArray();

    //     return array('id' => $array['id'], 'title' => $array['title']);
    // }
}
