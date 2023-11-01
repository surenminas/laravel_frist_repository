<?php

namespace App\Http\Controllers\Admin\Rate;

use App\Models\CountryRate;
use Illuminate\Support\Facades\Http;

use App\Http\Controllers\Admin\AdminBaseController;

class RateUpdateController extends AdminBaseController
{

    public function __invoke()

    {
        $data = $this->getRateList();

        // $data = ['GBP' => 200];

        $rates = CountryRate::all();
        foreach ($rates as $key => $value) {
            $attributs[$value->symbole] = '';
        }

        // $attributs = ['GBP' => ''];

        foreach ($data as $key => $value) {
            if (array_key_exists($key, $attributs)) {
                CountryRate::where('symbole', $key)->update(['rate_exchange' =>  $value]);
            }
        }
    }



    public function getRateList()
    {
        $response = Http::get('https://cb.am/latest.json.php');
        $data = json_decode($response->body());
        return $data;
    }
}
