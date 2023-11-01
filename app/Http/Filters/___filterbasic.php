<?php
namespace App\Http\Filters;

use App\Models\Post;
use Illuminate\Database\Eloquent\Builder;


class PostFilter
{
    private $queryParams = [];

    public function __construct(array $queryParams)
    {
        $this->queryParams = $queryParams;
    }
    
    public function apply(Builder $builder)
    {
        //$this->before($builder);
        
        foreach ($this->queryParams as $name => $callback) {
            
                call_user_func($callback, $builder, $this->queryParams[$name]);
            
        }
    }

    public function title(Builder $builder, $value)
    {
        $builder->where('title', 'like', "%{$value}%");
    }

    public function content(Builder $builder, $value)
    {
        $builder->where('content', 'like', "%{$value}%");
    }

    public function categoryId(Builder $builder, $value)
    {
        $builder->where('category_id', $value);
    }

}





//MODEL
trait Filterable
{
    public function scopeFilter(Builder $builder, FilterInterface $filter)
    {
        $filter->apply($builder);

        return $builder;
    }
}
//CONTROLLER
$filter = app()->make(PostFilter::class, ['queryParams' => array_filter($data)]); // = new PostFilter($args)

$posts = Post::filter($filter)->paginate(10);



