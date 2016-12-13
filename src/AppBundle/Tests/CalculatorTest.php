<?php

namespace AppBundle\Tests;

class CalculatorTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @test
     */
    public function shouldSum2and2AndReturn4()
    {
        $calculator = new Calculator();

        $result = $calculator->sum(2,2);

        $this->assertSame(4,$result);
    }

    /**
     * @test
     */
    public function shouldSum2and3andReturn5()
    {
        $calculator = new Calculator();

        $result = $calculator->sum(2,3);

        $this->assertSame(5, $result);
    }

    /**
     * @test
     *
     * @expectedException \Exception
     */
    public function shouldThrowExceptionIfParameterIsNegative()
    {
        $calculator = new Calculator();

        $calculator->sum(2,-3);
    }
}
