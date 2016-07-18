<?php

namespace App\Validation\Post;

use App\Validation\AValidator;

class PostValidator extends AValidator
{
    protected function getRules()
    {
        return [
            'title' => 'required',
            'date' => 'date'
        ];
    }
}
