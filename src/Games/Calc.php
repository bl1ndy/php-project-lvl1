<?php

namespace Brain\Games\Calc;

use function cli\line;
use function cli\prompt;
use function Brain\Games\Cli\getUserName;

const DESCRIPTION = 'What is the result of the expression?';

function startGame()
{
    $name = getUserName();

    line(DESCRIPTION);

    for ($i = 0; $i < 3; $i += 1) {
        $num1 = random_int(1, 9);
        $num2 = random_int(1, 9);
        $operations = ['+', '-', '*'];
        $operation = $operations[random_int(0, count($operations) - 1)];

        $question = "$num1 $operation $num2";
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

        $userAnswer = (int) prompt("Question: $question");
        line("Your answer: $userAnswer");

        if ($userAnswer === $correctAnswer) {
            line("Correct!");
        } else {
            line("'$userAnswer' is wrong answer ;(. "
            . "Correct answer was '$correctAnswer'.");
            line("Let's try again, $name!");
            break;
        }
    }
    if ($i === 3) {
        line("Congratulations, $name!");
    }
}
