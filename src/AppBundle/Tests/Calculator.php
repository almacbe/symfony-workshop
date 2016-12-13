<?php

namespace AppBundle\Tests;

class Calculator
{
    public function sum($firstNumber, $secondNumber)
    {
        if ($firstNumber < 0 || $secondNumber < 0) {
            throw new \Exception();
        }

        return $firstNumber+$secondNumber;
    }
}
