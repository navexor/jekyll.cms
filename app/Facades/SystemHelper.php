<?php namespace App\Facades;

use Illuminate\Support\Facades\Facade;

class SystemHelper extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'system.helper';
    }
}