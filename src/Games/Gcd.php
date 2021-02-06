<?php

namespace Brain\Games\Gcd;

use function Brain\Games\Engine\startGame;

const DESCRIPTION = 'Find the greatest common divisor of given numbers.';

function startRound()
{
    function gcd($num1, $num2)
    {
        $min = $num1 > $num2 ? $num2 : $num1;
        $result = 0;
        for ($i = 1; $i <= $min; $i += 1) {
            if ($num1 % $i === 0 && $num2 % $i === 0) {
                $result = $i;
            }
        }

        return $result;
    }

    $getQuestionAndAnswer = function () {
        $num1 = random_int(1, 99);
        $num2 = random_int(1, 99);
        $question = "$num1 $num2";
        $correctAnswer = gcd($num1, $num2);

        return [$question, $correctAnswer];
    };

    startGame(DESCRIPTION, $getQuestionAndAnswer);
}