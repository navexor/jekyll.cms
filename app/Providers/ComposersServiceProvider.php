<?php namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class ComposersServiceProvider extends ServiceProvider
{
    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {
        \View::composers(
            [
                'App\Composers\TopMenuComposer' => 'layouts._navbar',
            ]
        );
    }
}
