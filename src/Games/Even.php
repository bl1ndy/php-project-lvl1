<?php

namespace Brain\Games\Even;

use function Brain\Games\Engine\startGame;

const DESCRIPTION = 'Answer "yes" if the number is even, otherwise answer "no".';

function startRound()
{
    $getQuestionAndAnswer = function () {
        $question = random_int(1, 999);
        $correctAnswer = $question % 2 === 0 ? 'yes' : 'no';

        return [$question, $correctAnswer];
    };

    startGame(DESCRIPTION, $getQuestionAndAnswer);
}
