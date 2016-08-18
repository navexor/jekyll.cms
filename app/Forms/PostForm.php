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

    public function prepareInputData(array $data)
    {
        $data = parent::prepareInputData($data);

        if (empty($data['date'])) {
            $data['date'] = date("Y-m-d H:i:s", time());
        }

        if (empty($data['fileName'])) {

            $title = date("Y-m-d", strtotime($data['date'])) . ' ' . $data['title'];
            $data['fileName'] = \StringHelper::generateFilename($title);

        }

        return $data;
    }

}
