<?php

namespace App\Validation\Post;

use App\Validation\AValidator;

class PostImageValidator extends AValidator
{
    protected function getRules()
    {
        return [
            'name' => 'required',
            'tmp_name' => 'required',
            'type' => 'required|in:image/png',
            'error' => 'required|in:0',
            'size' => 'required|max:6000000',
        ];
    }
}
