<?php

namespace Tests\Unit;

use App\Services\SumService;
use PHPUnit\Framework\TestCase;

class SumTest extends TestCase
{
    /**
     * A basic unit test example.
     *
     * @return void
     */
    public function testExample()
    {
        $num1 = 1;
        $num2 = 3;
        $suspectedResult = 4;

        $result = SumService::add($num1, $num2);

        $this->assertTrue(($suspectedResult === $result),"Check is result OK");
    }
}
