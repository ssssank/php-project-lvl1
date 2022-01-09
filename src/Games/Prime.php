<?php

namespace Brain\Games\Prime;

use Brain\Engine;

use function Brain\Utils\getRandomInt;

const RULE = 'Answer "yes" if given number is prime. Otherwise answer "no".';

function isPrime($number)
{
    if ($number < 2) {
        return false;
    }
    for ($i = 2; $i < $number / 2; $i += 1) {
        if ($number % $i === 0) {
            return false;
        }
    }
    return true;
}
function getRightAnswer($question)
{
    return isPrime($question) ? 'yes' : 'no';
}

function prepareRound()
{
    $question = getRandomInt();
    $rightAnswer = getRightAnswer($question);
    return [
        'question' => (string) $question,
        'answer' => $rightAnswer
    ];
}


function startGame()
{
    $dataForGames = [];
    for ($i = 0; $i < Engine\WIN_ANSWERS_NUMBER; $i += 1) {
        $dataForGames[] = prepareRound();
    }
    return Engine\runGame(RULE, $dataForGames);
}
