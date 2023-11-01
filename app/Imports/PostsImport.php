<?php

namespace App\Imports;

use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\WithHeadinRow;
use App\Models\Post;

class PostsImport implements ToCollection
{
    /**
     * @param Collection $collection
     */
    public function collection(Collection $collection)
    {
        foreach ($collection as $item) {

            Post::firstOrCreate([
                'title' => $item[0],
            ], [
                'title' => $item[0],
                'content' => $item[1],
                'image' => $item[2],
                'like' => $item[3],
                'category_id' => 2,
            ]);
        }
    }
}
