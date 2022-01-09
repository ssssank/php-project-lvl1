<?php

namespace Brain\Games\Gcd;

use Brain\Engine;

use function Brain\Utils\getRandomInt;

const RULE = 'Find the greatest common divisor of given numbers.';

function gcd($first, $second)
{
    return $second > 0 ? gcd($second, $first % $second) : $first;
}

function prepareRound()
{
    $first = getRandomInt();
    $second = getRandomInt();
    $question = "$first $second";
    $rightAnswer = gcd($first, $second);
    return [
        'question' => (string) $question,
        'answer' => (string) $rightAnswer
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
