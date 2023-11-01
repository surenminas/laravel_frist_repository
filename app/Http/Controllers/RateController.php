<?php

namespace App\Http\Controllers;

use App\Models\Rate;
use Illuminate\Support\Facades\Http;
use App\Http\Controllers\BaseController;
use App\Models\CountryRate;

class RateController extends BaseController
{

    public function store()
    {

        $response = Http::get('https://cb.am/latest.json.php');

        $data = json_decode($response->body());

        // $attributs = [
        //     'USD' => '',
        //     'GBP' => '',
        //     'EUR' => '',
        //     'GEL' => '',
        //     'RUB' => ''
        // ];

        $CountryRate = CountryRate::all();
        foreach ($CountryRate as $key => $value) {
            $attributs[$value['symbole']] = '';
        }
        
        
        foreach ($data as $key => $value) {
            if (array_key_exists($key, $attributs)) {
                $attributs[$key] = $value;
            }
        }
        

        foreach ($attributs as $key => $value) {
            Rate::firstOrCreate([
                'currency' => $key,
            ], [
                'currency' => $key,
                'rate_exchange' => $value,
            ]);
        }

        dd('Created');
        // return $attributs;

    }

    public function update()
    {

        $rates = Rate::all();

        $response = Http::get('https://cb.am/latest.json.php');

        $data = json_decode($response->body());

        $attributs = [
            'USD' => '',
            'GBP' => '',
            'EUR' => '',
            'GEL' => '',
            'RUB' => ''
        ];

        foreach ($data as $key => $value) {
            if (array_key_exists($key, $attributs)) {
                // $attributs[$key] = $value;
                $aa = Rate::where('currency', $key)->update(['rate_exchange' =>  $value]);
            }
        }
    }
}
