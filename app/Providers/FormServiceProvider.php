<?php

namespace App\Providers;

use App\Forms\PostForm;
use App\Forms\PostImageForm;
use Illuminate\Support\ServiceProvider;

class FormServiceProvider extends ServiceProvider
{
    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(
            'App\Forms\PostForm',
            function () {
                return new PostForm(
                    $this->app->make('App\Validation\Post\PostValidator'),
                    $this->app->make('App\Repositories\IModel')
                );
            }
        );

        $this->app->bind(
            'App\Forms\PostImageForm',
            function () {
                return new PostImageForm(
                    $this->app->make('App\Validation\Post\PostImageValidator'),
                    $this->app->make('App\Repositories\IModel')
                );
            }
        );

    }
}
