<?php

namespace App\Forms;


use App\Repositories\IModel;
use App\Validation\IValidator;

class CrudForm implements ICrudForm
{
    protected $validator;
    protected $repository;

    public function __construct(
        IValidator $validator,
        IModel $repository)
    {
        $this->validator = $validator;
        $this->repository = $repository;
    }

    public function create(array $data = [])
    {
        $data = $this->prepareInputData($data);
        if ($this->validator->with($data)->passes()) {
            $instance = $this->repository->create($data);

            return $instance;
        } else {
            return null;
        }
    }

    public function update($id, array $data = [])
    {
        $data = $this->prepareInputData($data);
        if ($this->validator->with($data)->passes()) {
            $instance = $this->repository->update($id, $data);
            return $instance;
        } else {
            return null;
        }
    }

    public function errors()
    {
        return $this->validator->errors();
    }

    protected function prepareInputData(array $data)
    {
        return $data;
    }

}
