<?php

namespace Brain\Games\Engine;

use function cli\line;
use function cli\prompt;
use function Brain\Games\Cli\getUserName;

function startGame($description, $getQuestionAndAnswer)
{
    $name = getUserName();

    line($description);

    for ($i = 0; $i < 3; $i += 1) {
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
    if ($i === 3) {
        line("Congratulations, $name!");
    }
}
