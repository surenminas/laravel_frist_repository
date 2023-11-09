<?php

namespace App\Http\Controllers;

use function Psy\debug;

use Illuminate\Http\Request;
use App\Http\Controllers\BaseController;
// use App\Models\Post;

class ContactController extends BaseController
{
    public function index()
    {
        return view('about');
    }

}
