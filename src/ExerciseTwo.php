<?php

namespace Exercises;

use Exception;
use Exercises\Arithmetics\ArithmeticsBase;

class ExerciseTwo extends ArithmeticsBase
{
    /**
     * @var array<int>
     */
    private array $numbersArray = [];

    /**
     * @param int $number
     * @return bool
     * @throws Exception
     */

    public function isHappy(int $number): bool
    {
        if (!$this->isNatural($number)) {
            throw new Exception("Por favor informe um número natural.");
        }

        if (in_array($number, $this->numbersArray)) {
            return false;
        }

        $array_numbers = str_split((string)$number);
        $sum = 0;

        foreach ($array_numbers as $item) {
            $sum += ((int)$item * (int)$item);
        }
        if ($sum === 1) {
            return true;
        } else {
            $this->numbersArray[] = $number;
            return $this->isHappy($sum);
        }
    }
}
