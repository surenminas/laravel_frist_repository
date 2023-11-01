<?php

namespace App\Console\Commands;

use App\Models\Post;
use Illuminate\Console\Command;
use App\Components\ImportsDataClient;

class ImportJsonPlaceholderCommand extends Command
{

    protected $signature = 'import:json-placeholder-command';


    protected $description = 'Get data jsonplaceholder';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $import = new ImportsDataClient();
        $response = $import->client->request('GET', 'posts');
        $data = json_decode($response->getBody()->getContents());

        foreach ($data as $item) {
            Post::firstOrCreate([
                'title' => $item->title
            ], [
                'title' => $item->title,
                'content' => $item->body,
                'category_id' => 2,
                'image' => 'https://via.placeholder.com/640x480.png/0099ee?text=quia'

            ]);
        }
    }
}
