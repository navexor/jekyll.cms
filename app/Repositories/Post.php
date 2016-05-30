<?php

namespace App\Repositories;

/**
 * Created by PhpStorm.
 * User: oleg
 * Date: 30.05.2016
 * Time: 22:14
 */
class Post
{
    private $_filePath;

    public function __construct($filePath = '')
    {
        $this->_filePath = $filePath;
    }

    public function all()
    {
        return ['..', 'aa'];
    }

    public function createOrUpdate()
    {

    }

    public function delete()
    {

    }

}