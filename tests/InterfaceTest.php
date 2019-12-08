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
            public function toValidator(): Validator
            {
                return new class implements Validator
                {
                    public function getMessageBag(){}

                    public function validate(){}

                    public function validated(){}

                    public function fails(){}

                    public function failed(){}

                    public function sometimes($attribute, $rules, callable $callback){}

                    public function after($callback){}

                    public function errors(){}
                };
            }
        };
    }

    public function testSomething()
    {
        $validator = $this->fakeValidatorBuilder()->toValidator();

        $this->assertInstanceOf(Validator::class, $validator);
    }
}
