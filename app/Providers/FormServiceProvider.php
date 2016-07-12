<?php

namespace App\Providers;

use App\Forms\PostForm;
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

    }
}
