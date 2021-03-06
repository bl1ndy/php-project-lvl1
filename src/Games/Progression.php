<?php

namespace Brain\Games\Progression;

use function Brain\Games\Engine\startGame;

const DESCRIPTION = 'What number is missing in the progression?';

function progression(): array
{
    $begin = random_int(0, 100);
    $count = random_int(5, 10);
    $lostNumPosition = random_int(0, $count - 1);
    $incrementor = random_int(3, 10);

    $result = [];
    for ($i = 0; $i < $count; $i += 1, $begin += $incrementor) {
        $result[] = $begin;
    }

    $lostNum = $result[$lostNumPosition];
    $result[$lostNumPosition] = '..';

    return [implode(' ', $result), $lostNum];
}

function startRound(): void
{
    $getQuestionAndAnswer = function (): array {
        [$question, $correctAnswer] = progression();

        return [$question, $correctAnswer];
    };

    startGame(DESCRIPTION, $getQuestionAndAnswer);
}
