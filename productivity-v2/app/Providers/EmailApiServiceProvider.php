<?php

namespace App\Providers;


use App\Masivian\Email\EmailApi;
use Illuminate\Support\ServiceProvider;

class EmailApiServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind('emailApi', function () {
            return new EmailApi();
        });
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
