<?php

namespace App\Validation;

interface IValidator
{
    public function with(array $input);
    public function passes();
    public function errors();
}
