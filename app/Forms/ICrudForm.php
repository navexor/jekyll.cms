<?php
namespace App\Forms;

interface ICrudForm
{
    public function create(array $data = []);
    public function update($id, array $data = []);
    public function errors();
}
