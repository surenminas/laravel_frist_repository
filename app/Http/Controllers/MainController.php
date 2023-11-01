<?php

namespace App\Http\Controllers;

use App\Http\Controllers\BaseController;
use App\Models\CountryRate;


class MainController extends BaseController
{
    public function index()
    {
        $rates = CountryRate::all();
        $updateDate = CountryRate::first();
        // dd($updateDate->updated_at);
        return view('main', compact('rates'));
    }
}
