<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Blade;

class TemaGroupServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Blade::directive('h2li',function ($text){

            $str  = "<div class='position-relative' style=''>";
            $str .= "<p class='fs-2 text-center title-section-white text-white'>". strtoupper($text) ."</p>";
            $str .= "</div>";

            return $str;
        });
        Blade::directive('h2dk',function ($text){

            $str  = "<div class='position-relative' style=''>";
            $str .= "<p class='fs-2 text-center title-section-white'>". strtoupper($text) ."</p>";
            $str .= "</div>";

            return $str;
        });
    }
}
