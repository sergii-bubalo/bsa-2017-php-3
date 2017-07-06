<?php

declare(strict_types = 1);

namespace BinaryStudioAcademy\Task1;

class Calculator
{
    public static function add(int ...$x): int
    {
    	return array_sum(func_get_args());
    }

    public static function subtract(int ...$x): int
    {
    	$args = func_get_args();
    	$result = $args[0];

    	for ($i = 1; $i <= count($args) - 1; $i++) {
    	    $result -= $args[$i];
	}

	return $result;
    }

    public static function multiply(int ...$x): int
    {
        $args = func_get_args();
        $result = $args[0];

        for ($i = 1; $i <= count($args) - 1; $i++) {
	    $result *= $args[$i];
        }

        return $result;
    }

    public static function divide(int ...$x): int
    {
        $args = func_get_args();
        $result = $args[0];

        for ($i = 1; $i <= count($args) - 1; $i++) {
	        if ($args[$i] != 0) {
	            $result /= $args[$i];
	        } else {
	            throw new \DivisionByZeroError();
	        }
        }

		return intval($result);
	}


    public static function pow2(int $n): int
    {
        return 2**$n; 
    }
}
