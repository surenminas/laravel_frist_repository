<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Author;
use App\Models\Book;
use App\Models\Category;
use App\Models\Country;
use Illuminate\Database\Seeder;
use App\Models\Post;
use App\Models\Tag;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        Category::factory(15)->create();
        $tags = Tag::factory(10)->create();
        $posts = Post::factory(50)->create();


        foreach($posts as $post){
            $tagsIds = $tags->random(5)->pluck('id');
            $post->tags()->attach($tagsIds);
        }

        // Author::factory(30)->create();
        // $countries = Country::factory(20)->create();
        // $books = Book::factory(200)->create();

        // foreach($books as $book){
        //     $countriesIds = $countries->random(10)->pluck('id');
        //     $book->countries()->attach($countriesIds);
        // }
        
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
    }
}
