<?php

namespace Brain\Games\Calc;

use function Brain\Games\Engine\startGame;

const DESCRIPTION = 'What is the result of the expression?';

function startRound(): void
{
    $getQuestionAndAnswer = function (): array {
        $num1 = random_int(1, 9);
        $num2 = random_int(1, 9);
        $operations = ['+', '-', '*'];
        $operation = $operations[random_int(0, count($operations) - 1)];

        $question = "$num1 $operation $num2";
        $correctAnswer = 0;
        switch ($operation) {
            case '+':
                $correctAnswer = $num1 + $num2;
                break;
            case '-':
                $correctAnswer = $num1 - $num2;
                break;
            case '*':
                $correctAnswer = $num1 * $num2;
                break;
        }

        return [$question, $correctAnswer];
    };

    startGame(DESCRIPTION, $getQuestionAndAnswer);
}
