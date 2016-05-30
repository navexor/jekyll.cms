<?php

namespace App\Providers;

use App\Repositories\Post;
use Illuminate\Support\ServiceProvider;

class PostServiceProvider extends ServiceProvider
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
        $this->app->singleton(
            'post',
            function () {
                return new Post(config('blog.file.main'));
            }
        );
    }
}
