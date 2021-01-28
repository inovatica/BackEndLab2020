<?php

namespace Tests\Unit;

use App\Exceptions\DivisionByZero;
use App\Services\SumService;
use PHPUnit\Framework\TestCase;

class CalculateTest extends TestCase
{
    /**
     * A basic unit test example.
     *
     * @return void
     */
    public function testSum()
    {
        $num1 = 1;
        $num2 = 3;
        $suspectedResult = 4;

        $result = SumService::calculate($num1, $num2, "+");

        $this->assertTrue(($suspectedResult === $result), "Check is sum result OK");
    }

    public function testMultiplication()
    {

        $num1 = 1;
        $num2 = 3;
        $suspectedResult = 3;

        $result = SumService::calculate($num1, $num2, "*");

        $this->assertTrue(($suspectedResult === $result), "Check is multiplication result OK");
    }

    public function testDivide()
    {

        $num1 = 1;
        $num2 = 3;
        $suspectedResult = 1 / 3;

        $result = SumService::calculate($num1, $num2, "/");

        $this->assertTrue(($suspectedResult === $result), "Check is divide result OK");
    }

    public function testDivideBy0()
    {
        $this->expectException(DivisionByZero::class);

        $num1 = 1;
        $num2 = 0;

        SumService::calculate($num1, $num2, "/");
    }

    public function testSubtraction()
    {

        $num1 = 1;
        $num2 = 3;
        $suspectedResult = -2;

        $result = SumService::calculate($num1, $num2, "-");

        $this->assertTrue(($suspectedResult === $result), "Check is subtraction result OK");
    }

    public function testWongSubtractionAnswer()
    {
        $num1 = 1;
        $num2 = 2;
        $suspectedResult = -2;

        $result = SumService::calculate($num1, $num2, "-");

        $this->assertFalse(($suspectedResult === $result), "Check is subtraction result wrong");
    }

}
