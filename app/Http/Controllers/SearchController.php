<?php

namespace App\Http\Controllers;

use App\Hotel;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    public function __invoke(Request $request)
    {
        // Set query builder
        $qb = Hotel::query();
        foreach ($request->except(['sortBy', 'perPage', 'availability', 'price']) as $key => $value) {
            Request::searchExact($qb, $key, $value);
        }
        // if ($request->has('name')) {
        //     $qb->where('name', '=', $request->name);
        // }
        // if ($request->has('city')) {
        //     $qb->where('city', '=', $request->city);
        // }
        if ($request->has('price')) {
            $param = explode($request->price, ':');
            Request::searchBetween($qb, 'price', $param[0], $param[1]);
        }
        if ($request->has('availability')) {
            $param = explode($request->availability, ':');
            Request::searchBetween($qb, 'availability', $param[0], $param[1]);
        }
        if ($request->has('sortby')) {
            $qb->orderBy($request->get('sortBy'), $request->get('direction', 'ASC'));
        }

        return $qb->paginate((int) $request->perPage);
    }
}
