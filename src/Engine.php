<?php

namespace Brain\Engine;

use function cli\line;
use function cli\prompt;
use function cli\out;

const WIN_ANSWERS_NUMBER = 3;

function runGame(string $rule, array $dataForGames)
{
    $rightAnswerCounter = 0;

    line("Welcome to the Brain Game!");
    line($rule);

    $userName = prompt("May I have your name?", 'anonymous', ' ');
    line("Hello, %s!", $userName);

    while ($rightAnswerCounter < WIN_ANSWERS_NUMBER) {
        $questionWithAnswer = $dataForGames[$rightAnswerCounter];
        $currentQuestion = $questionWithAnswer['question'];
        $rightAnswer = $questionWithAnswer['answer'];
        line("Question: $currentQuestion");
        $userAnswer = prompt("Your answer");
        if ($userAnswer === $rightAnswer) {
            line("Correct!");
            $rightAnswerCounter += 1;
        } else {
            out("'%s' is wrong answer ;(. ", $userAnswer);
            line("Correct answer was '%s'.", $rightAnswer);
            line("Let's try again, %s!", $userName);
            break;
        }
    }

    if ($rightAnswerCounter === WIN_ANSWERS_NUMBER) {
        line("Congratulations, %s!", $userName);
    }
}
