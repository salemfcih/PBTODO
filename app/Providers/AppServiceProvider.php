<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        \Request::macro('searchExact', function ($hash, $key, $value) {
            return $hash->where((string) $key, (string) $value);
        });
        \Request::macro('searchBetween', function ($hash, $key, $value1, $value2) {
            return $hash->whereBetween((string) $key, [(string) $value1, (string) $value2]);
        });
        \Request::macro('searchApiExact', function ($array, $key, $value) {
            return array_filter($array, function ($x) use ($key, $value) {
                return $x[$key] == $value;
            });
        });
        \Request::macro('searchApiBetween', function ($array, $key, $value1, $value2) {
            return array_filter($array, function ($x) use ($key, $value1, $value2) {
                return $x[$key] > $value1 && $x[$key] < $value2;
            });
        });
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
