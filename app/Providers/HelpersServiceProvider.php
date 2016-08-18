<?php

namespace App\Providers;

use App\Helpers\StringHelper;
use Illuminate\Support\ServiceProvider;

class HelpersServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app['string.helper'] = $this->app->share(
            function () {
                return new StringHelper();
            }
        );
    }
}
