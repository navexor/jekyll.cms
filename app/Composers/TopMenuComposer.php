<?php namespace App\Composers;

use Illuminate\View\View;
use App\Services\Menu\Menu;

class TopMenuComposer
{
    private $menu;

    public function __construct(Menu $menu)
    {
        $this->menu = $menu;
    }

    /**
     * @param View $view
     */
    public function compose($view)
    {
        $menuItems = $this->menu->getItems();
        $currentAlias = \Request::route()->getAction()['as'];
        $topMenu = [];
        foreach ($menuItems as $item) {
            $active = false;
            if (!empty($item['alias'])) {
                if (strpos($currentAlias, $item['alias']) === 0) {
                    $active = true;
                }
            } elseif (\Request::url() == $item['url']) {
                $active = true;
            }
            $item['active'] = $active;
            $topMenu[] = $item;
        }

        $view->with(compact('topMenu'));
    }
}
