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
            'App\Repositories\Post',
            function () {
                $post = new Post(
                    config('blog.file'),
                    $this->app->make('App\Repositories\Post\PostParser')
                );
                return $post;
            }
        );

        $this->app->bind('post', 'App\Repositories\Post');
    }
}
