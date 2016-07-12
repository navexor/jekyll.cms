<?php

namespace App\Repositories;


interface IModel
{
    public function create(array $data);
    public function update($id, array $data);
    public function remove($id);
}