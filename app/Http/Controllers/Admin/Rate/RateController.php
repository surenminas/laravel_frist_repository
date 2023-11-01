<?php

namespace App\Http\Controllers\Admin\Rate;

use App\Models\CountryRate;
use Illuminate\Support\Facades\Http;
use App\Http\Requests\Rate\UpdateRequest;
use App\Http\Requests\Rate\StoreRequest;
use App\Http\Controllers\Admin\AdminBaseController;

class RateController extends AdminBaseController
{

    public function index()
    {

        $countryRate = CountryRate::all();

        return view('admin.rate.index', compact('countryRate'));
    }

    public function create()
    {
        return view('admin.rate.create');
    }

    public function store(StoreRequest $request)
    {
        $data = $request->validated();


        $rateList = $this->getRateList();

        $symbole = '';
        $rateExchange = '';

        foreach ($rateList as $key => $value) {
            if ($key === $data['symbole']) {
                $symbole = $key;
                $rateExchange = $value;

                CountryRate::firstOrCreate([
                    'symbole' => $symbole,
                ], [
                    'name' => $data['name'],
                    'symbole' => $symbole,
                    'rate_exchange' => $rateExchange,
                ]);
            } else {
                dd('error');
            }
        }



        return redirect()->route('admin.rate.index');
    }

    public function edit(CountryRate $rate)
    {

        return view('admin.rate.edit', compact('rate'));
    }

    public function update(UpdateRequest $request, CountryRate $rate)
    {

        $data = $request->validated();

        $rate->update($data);


        return redirect()->route('admin.rate.index');
    }

    public function destroy(CountryRate $rate)
    {
        $rate->delete();
        return redirect()->route('admin.rate.index');
    }

    public function updateRateData()
    {

        $data = $this->getRateList();

        $attributs = [];
        $rates = CountryRate::all();
        foreach ($rates as $key => $value) {
            $attributs[$value->symbole] = '';
        }

        foreach ($data as $key => $value) {
            if (array_key_exists($key, $attributs)) {
                // $rates->update(['rate_exchange' =>  $value]);
                CountryRate::where('symbole', $key)->update(['rate_exchange' =>  $value]);
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
