<?php

namespace BYanelli\Support;

use Illuminate\Contracts\Validation\Validator;

interface Validatorable
{
    /**
     * @param array $data
     * @return $this
     */
    public function setData(array $data): self;

    /**
     * @param $object
     * @return $this
     */
    public function setObject($object): self;

    public function toValidator(): Validator;
}
