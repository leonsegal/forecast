<?php

namespace Leonsegal\Forecast;

use App\Http\Controllers\Controller;
use Leonsegal\Forecast\Requests\Store;
use App\User;

class ForecastController extends Controller
{

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        return view('forecast::forecast-landing');
    }

    /**
     * @param Store $request
     * @return mixed
     */
    public function store(Store $request)
    {
        $ip = IpAddress::where('ip_address', $request->ip_address)->first();

        if (!$ip) {
            $ip_response = json_decode(
                file_get_contents(
                    "http://ip-api.com/json/{$request->ip_address}"
                ), true
            );

            $ip = IpAddress::create([
                'ip_address' => $request->ip_address,
                'city' => $ip_response['city'],
                'country' => $ip_response['country'],
                'datetime' => now(),
            ]);
        }

        $forecast = $ip->forecast()->first();

        if (!$forecast) {
            $forecast_response = json_decode(json_encode(file_get_contents(
                "http://api.openweathermap.org/data/2.5/forecast?q={$ip->city},{$ip->country}&APPID=" . env('OPENWEATHER_API_KEY')
            )));

            $ip->forecast()->create([
                'data' => $forecast_response
            ]);
        }


        return redirect(route('forecast', compact('ip')));
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function show()
    {
        $ip = IpAddress::findOrFail(request()->id);
        $forecast = json_decode($ip->forecast->data);

        return view('forecast::show', (compact('forecast')));
    }
}
