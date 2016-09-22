<?php namespace App\Services\Menu;

class Menu
{
    private $_items = [];

    public function addItem($item = [])
    {
        array_push($this->_items, $item);
    }

    public function getItems()
    {
        return $this->_items;
    }
}