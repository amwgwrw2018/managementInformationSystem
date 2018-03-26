<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Response;
class nhutProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        Response::macro('caps',function($str){
            return strtoupper($str);
        });
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
