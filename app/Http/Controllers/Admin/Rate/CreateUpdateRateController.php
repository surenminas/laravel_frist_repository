<?php

namespace App\Http\Controllers\Admin\Rate;

use App\Models\Rate;
use Illuminate\Support\Facades\Http;
use App\Http\Controllers\BaseController;
use App\Models\CountryRate;

class CreateUpdateRateController extends BaseController
{

    public function store()
    {

        // $response = Http::get('https://cb.am/latest.json.php');
        // $data = json_decode($response->body());

        $data = $this->getRateList();

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


        return redirect()->route('admin.rate.index')->with('messageRate', 'Created!');

    }

    public function update()
    {

        $data = $this->getRateList();

        
        $rates = Rate::all();
        foreach ($rates as $key => $value) {
            $attributs[$value['currency']] = '';
        }
        
        foreach ($data as $key => $value) {
            if (array_key_exists($key, $attributs)) {
                Rate::where('currency', $key)->update(['rate_exchange' =>  $value]);
            }
        }

        return redirect()->route('admin.rate.index')->with('messageRateUpdated', 'updated!');

    }

    public function getRateList()
    {
        $response = Http::get('https://cb.am/latest.json.php');
        $data = json_decode($response->body());
        return $data;
    }
}
