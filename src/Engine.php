<?php

namespace Brain\Games\Engine;

use function cli\line;
use function cli\prompt;
use function Brain\Games\Cli\getUserName;

function startGame(string $description, callable $getQuestionAndAnswer): void
{
    $name = getUserName();

    line($description);
    $rounds = 0;

    for (; $rounds < 3; $rounds += 1) {
        [$question, $correctAnswer] = $getQuestionAndAnswer();

        $userAnswer = prompt("Question: $question");
        line("Your answer: $userAnswer");

        if ($userAnswer == $correctAnswer) {
            line("Correct!");
        } else {
            line("'$userAnswer' is wrong answer ;(. "
            . "Correct answer was '$correctAnswer'.");
            line("Let's try again, $name!");
            break;
        }
    }
    if ($rounds === 3) {
        line("Congratulations, $name!");
    }
}
