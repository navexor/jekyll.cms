<?php

namespace App\Validation\Post;

use App\Validation\AValidator;

class PostValidator extends AValidator
{
    protected function getRules()
    {
        return [
            'name' => ['required'],
            'icon_file' => 'sometimes|mimes:jpeg,png,gif',
            'position' => 'integer',
        ];
    }
}
