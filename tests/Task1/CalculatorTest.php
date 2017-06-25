<?php

namespace BinaryStudioAcademyTests\Task1;

use PHPUnit\Framework\TestCase;
use BinaryStudioAcademy\Task1\Calculator;

class CalculatorTest extends TestCase
{
    /**
     * @var Calculator
     */
    private $calculator;

    protected function setUp()
    {
        parent::setUp();

        $this->calculator = new Calculator();
    }

    public function test_should_create_calculator()
    {
        $this->assertInstanceOf(Calculator::class, $this->calculator);
    }

    /**
     * @param int $a
     * @param int $b
     * @param int $expected
     *
     * @dataProvider addDataProvider
     */
    public function test_calculator_should_add_integers(int $a, int $b, int $expected)
    {
        $actual = $this->calculator->add($a, $b);
        $this->assertEquals($expected, $actual);
    }

    /**
     * @param int $a
     * @param int $b
     * @param int $expected
     *
     * @dataProvider subtractDataProvider
     */
    public function test_calculator_should_subtract_integers(int $a, int $b, int $expected)
    {
        $actual = $this->calculator->subtract($a, $b);
        $this->assertEquals($expected, $actual);
    }

    /**
     * @param int $a
     * @param int $b
     * @param int $expected
     *
     * @dataProvider multiplyDataProvider
     */
    public function test_calculator_should_multiply_integers(int $a, int $b, int $expected)
    {
        $actual = $this->calculator->multiply($a, $b);
        $this->assertEquals($expected, $actual);
    }

    /**
     * @param int $a
     * @param int $b
     * @param int $expected
     *
     * @dataProvider divideDataProvider
     */
    public function test_calculator_should_divide_integers(int $a, int $b, int $expected)
    {
        $actual = $this->calculator->divide($a, $b);
        $this->assertEquals($expected, $actual);
    }

    public function test_calculator_should_not_divide_by_zero()
    {
        $this->expectException(\DivisionByZeroError::class);

        $this->calculator->divide(1, 0);
    }

    /**
     * @param int $n
     * @param int $expected
     *
     * @dataProvider powerOfTwoDataProvider
     */
    public function test_calculator_should_exponent_two_in_n(int $n, int $expected)
    {
        $actual = $this->calculator->pow2($n);
        $this->assertEquals($expected, $actual);
    }

    public function test_calculator_should_not_work_with_non_int()
    {
        $this->expectException(\TypeError::class);
        $this->calculator->add(null, '15');
    }

    public function addDataProvider()
    {
        return [
            [0, 0, 0],
            [2, 2, 4],
            [-5, 22, 17],
            [-7, -8, -15]
        ];
    }

    public function subtractDataProvider()
    {
        return [
            [0, 0, 0],
            [4, 2, 2],
            [-5, -2, -3],
            [-7, 8, -15]
        ];
    }

    public function multiplyDataProvider()
    {
        return [
            [0, 0, 0],
            [2, 2, 4],
            [11, 11, 121],
            [-3, -3, 9],
            [13, -13, -169],
        ];
    }

    public function divideDataProvider()
    {
        return [
            [1, 1, 1],
            [9, 3, 3],
            [9, 2, 4],
            [15, -5, -3],
            [-1000, -5, 200],
        ];
    }

    public function powerOfTwoDataProvider()
    {
        return [
            [5, 32],
            [6, 64],
            [10, 1024],
            [20, 1048576],
        ];
    }
}
