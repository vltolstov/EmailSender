<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Library\Services\CardDav;

class CardDavServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        $this->app->bind('App\Library\Services\CardDavInterface', function ($app){
            return new CardDav();
        });
    }
}
