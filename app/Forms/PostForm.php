<?php

namespace App\Forms;

use App\Repositories\IModel;
use App\Validation\Post\PostValidator;

class PostForm extends CrudForm
{
    public function __construct(PostValidator $validator, IModel $repository)
    {
        parent::__construct($validator, $repository);
    }

}
