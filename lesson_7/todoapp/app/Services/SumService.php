<?php

namespace App\Services;

use App\Exceptions\DivisionByZero;

class SumService
{
    public static function add(int $number1, int $number2): int
    {
        return $number1 + $number2;
    }

    public static function calculate(int $number1, int $number2, string $operator)
    {
        $result = null;
        switch ($operator) {
            case "+":
                $result = $number1 + $number2;
                break;
            case "-":
                $result = $number1 - $number2;
                break;
            case "*":
                $result = $number1 * $number2;
                break;
            case "/":
                try {
                    $result = $number1 / $number2;
                } catch (\Exception $exception) {
                    throw new DivisionByZero();
                }
                break;
        }
        return $result;
    }
}
