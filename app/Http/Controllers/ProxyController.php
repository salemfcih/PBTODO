<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use GuzzleHttp\Client;

class ProxyController extends Controller
{
    public function __invoke(Request $request)
    {
        $client = new Client();
        $hotels = collect(json_decode(
            $client->request('GET', 'https://api.myjson.com/bins/pq0f6')->getBody(),
            true
        )['hotels']);

        $response = $request->all() ? $hotels->filter(function ($x) use ($request) {
            $found = 0;
            if ($request->has('name') && $request->name == $x['name']) {
                $found++;
            }
            if ($request->has('city') && $request->city == $x['city']) {
                $found++;
            }
            if ($request->has('price')) {
                $param = explode(':', $request->price);
                if ($x > $param[0] && $x < $param[1]) {
                    $found++;
                }
            }
            if ($request->has('availability')) {
                $param = explode(':', $request->availability);
                foreach ($x['availability'] as $availability) {
                    if ($availability['from'] > $param[0] && $availability['to'] < $param[1]) {
                        $found++;
                    }
                }
            }
            return $found > 0;
        }) : $hotels;

        return $response;
    }
}
