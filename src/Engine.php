<?php

namespace Brain\Engine;

use function cli\line;
use function cli\prompt;
use function cli\out;

const WIN_ANSWERS_NUMBER = 3;

function runGame(string $rule, array $rounds)
{
    line("Welcome to the Brain Game!");
    line($rule);

    $userName = prompt("May I have your name?", 'anonymous', ' ');
    line("Hello, %s!", $userName);

    for ($i = 0; $i < WIN_ANSWERS_NUMBER; $i += 1) {
        $questionWithAnswer = $rounds[$i];
        $currentQuestion = $questionWithAnswer['question'];
        $rightAnswer = $questionWithAnswer['answer'];

        line("Question: $currentQuestion");

        $userAnswer = prompt("Your answer");

        if ($userAnswer === $rightAnswer) {
            line("Correct!");
        } else {
            out("'%s' is wrong answer ;(. ", $userAnswer);
            line("Correct answer was '%s'.", $rightAnswer);
            line("Let's try again, %s!", $userName);
            return;
        }
    }

    line("Congratulations, %s!", $userName);
}
