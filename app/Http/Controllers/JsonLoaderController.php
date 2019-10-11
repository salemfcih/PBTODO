<?php

namespace App\Http\Controllers;

use App\Hotel;
use GuzzleHttp\Client;
use Illuminate\Http\Request;

class JsonLoaderController extends Controller
{
    public function __invoke(Request $request)
    {
        $client = new Client();
        $hotels = json_decode(
            $client->request('GET', 'https://api.myjson.com/bins/pq0f6')->getBody(),
            true
        )['hotels'];
        for ($i = 0; count($hotels) > $i; $i++) {
            for ($y = 0; count($hotels[$i]['availability']) > $y; $y++) {
                Hotel::create([
                    'name' => $hotels[$i]['name'],
                    'price' => $hotels[$i]['price'],
                    'city' => $hotels[$i]['city'],
                    'availability' => $hotels[$i]['availability'][$y]['from'] . ":" . $hotels[$i]['availability'][$y]['to'],
                ]);
            }
        }
    }
}
