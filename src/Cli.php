<?php

namespace Brain\Games\Cli;

use function cli\line;
use function cli\prompt;

function getUserName(): string
{
    line("Welcome to the Brain Game!\n");
    $name = prompt('May I have your name?');
    line("\nHello, %s!", $name);

    return $name;
}
