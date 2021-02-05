<?php

namespace Brain\Games\Even;

use function cli\line;
use function cli\prompt;
use function Brain\Games\Cli\getUserName;

const DESCRIPTION = 'Answer "yes" if the number is even, otherwise answer "no".';

function startGame()
{
    $name = getUserName();

    line(DESCRIPTION);

    for ($i = 0; $i < 3; $i += 1) {
        $question = random_int(1, 999);
        $correctAnswer = $question % 2 === 0 ? 'yes' : 'no';

        $userAnswer = prompt("Question: $question");
        line("Your answer: $userAnswer");

        if ($userAnswer === $correctAnswer) {
            line("Correct!");
        } else {
            line("'$userAnswer' is wrong answer ;(. Correct answer was '$correctAnswer'.");
            line("Let's try again, $name!");
            break;
        }
    }
    if ($i === 3) {
        line("Congratulations, $name!");
    }
}
