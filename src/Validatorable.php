<?php

namespace BYanelli\Support;

use Illuminate\Contracts\Validation\Validator;

interface Validatorable
{
    public function toValidator(): Validator;
}
