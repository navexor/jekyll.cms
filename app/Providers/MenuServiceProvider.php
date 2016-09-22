<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Services\Menu\Menu;

class MenuServiceProvider extends ServiceProvider
{
    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton(
            'App\Services\Menu\Menu',
            function () {

                $menu = new Menu();

                $menu->addItem([
                    'name' => 'Home',
                    'alias' => 'home',
                    'url' => route('home'),
                    'sub_menu' => null
                ]);

                $menu->addItem([
                    'name' => 'Posts',
                    'alias' => 'posts',
                    'url' => route('posts.index'),
                    'sub_menu' => null
                ]);

                $menu->addItem([
                    'name' => 'Submenu',
                    'url' => '/some-url',
                    'sub_menu' => [
                        [
                            'name' => 'Submenu 1',
                            'url' => '/some-url1',
                        ],
                        [
                            'name' => 'Submenu 2',
                            'url' => '/some-url2',
                        ],
                    ]
                ]);

                return $menu;
            }
        );

        $this->app->bind('post', 'App\Repositories\Post');
    }
}
