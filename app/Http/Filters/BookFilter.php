<?php


namespace App\Http\Filters;


use Illuminate\Database\Eloquent\Builder;

class BookFilter extends AbstractFilter
{
    public const NAME = 'name';
    public const AUTHOR_ID = 'author_id';


    protected function getCallbacks(): array
    {
        return [
            self::NAME => [$this, 'name'],
            self::AUTHOR_ID => [$this, 'authorId'],
        ];
    }

    public function name(Builder $builder, $value)
    {
        $builder->where('name', 'like', "%{$value}%");
    }

    public function authorId(Builder $builder, $value)
    {
        $builder->where('author_id', $value);
    }
}
