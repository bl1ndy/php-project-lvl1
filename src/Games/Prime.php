<?php

namespace Brain\Games\Prime;

use function Brain\Games\Engine\startGame;

const DESCRIPTION = 'Answer "yes" if given number is prime. Otherwise answer "no".';

function startRound(): void
{
    function isPrime(int $num): string
    {
        for ($i = 2; $i <= $num / 2; $i += 1) {
            if ($num % $i === 0 && $num !== $i) {
                return 'no';
            }
        }

        return 'yes';
    }

    $getQuestionAndAnswer = function (): array {
        $question = random_int(1, 99);
        $correctAnswer = isPrime($question);

        return [$question, $correctAnswer];
    };

    startGame(DESCRIPTION, $getQuestionAndAnswer);
}
