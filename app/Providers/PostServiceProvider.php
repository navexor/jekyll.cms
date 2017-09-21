<?php

namespace App\Providers;

use App\Repositories\Post;
use App\Repositories\PostImage;
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
                    $this->app->make('App\Repositories\Post\PostParser'),
                    $this->app->make('App\Repositories\Post\PostFile')
                );
                return $post;
            }
        );

        $this->app->singleton(
            'App\Repositories\PostImage',
            function () {
                $postImage = new PostImage(
                    config('blog.file'),
                    $this->app->make('App\Repositories\PostImage\PostImageFile')
                );
                return $postImage;
            }
        );

        $this->app->bind('post', 'App\Repositories\Post');
    }
}
