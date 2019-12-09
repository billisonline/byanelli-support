<?php

namespace BYanelli\Support\Tests;

use BYanelli\Support\Validatorable;
use Illuminate\Contracts\Validation\Validator;
use PHPUnit\Framework\TestCase;

class InterfaceTest extends TestCase
{
    public function fakeValidatorBuilder()
    {
        return new class implements Validatorable
        {
            public function setData(array $data): Validatorable {return $this;}

            public function setObject($object): Validatorable {return $this;}

            public function toValidator(): Validator
            {
                return new class implements Validator
                {
                    public function getMessageBag() {}

                    public function validate() {}

                    public function validated() {}

                    public function fails() {}

                    public function failed() {}

                    public function sometimes($attribute, $rules, callable $callback) {}

                    public function after($callback) {}

                    public function errors() {}
                };
            }
        };
    }

    public function testBuildValidator()
    {
        $validator = (
            $this->fakeValidatorBuilder()
                ->setData([])
                ->setObject((object) [])
                ->toValidator()
        );

        $this->assertInstanceOf(Validator::class, $validator);
    }
}
