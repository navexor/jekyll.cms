<?php

namespace App\Forms;

use App\Repositories\IModel;
use App\Validation\Post\PostImageValidator;

class PostImageForm extends CrudForm
{
    public function __construct(PostImageValidator $validator, IModel $repository)
    {
        parent::__construct($validator, $repository);
    }

    public function prepareInputData(array $data)
    {
        $data = parent::prepareInputData($data);
        return $data;
    }

}
