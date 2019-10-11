<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

// Approach 1

// you can load the inventory and keep it in your database .. as per the link sent it is pq0f6
// so when you use the api .. add ?address=pq0f6
Route::get('/load-json', 'JsonLoaderController');

// then you can search it
Route::get('/search', 'SearchController');


// Approach 2

// you can create a proxy and search within the api
Route::get('/proxy', 'ProxyController');
