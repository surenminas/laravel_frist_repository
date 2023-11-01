<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Maatwebsite\Excel\Facades\Excel;
use App\Imports\PostsImport;

class ImportExcelCommand extends Command
{

    protected $signature = 'import:excel';


    protected $description = 'Get data excel';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        Excel::import(new PostsImport(), public_path('excel/Posts.xlsx'));
        dd('finish');
    }
}
