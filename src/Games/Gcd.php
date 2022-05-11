<?php

namespace Brain\Games\Gcd;

use Brain\Engine;

use function Brain\Utils\getRandomInt;

const RULE = 'Find the greatest common divisor of given numbers.';

function gcd(int $first, int $second)
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
        'question' => $question,
        'answer' => (string) $rightAnswer
    ];
}

function startGame()
{
    $rounds = [];
    for ($i = 0; $i < Engine\WIN_ANSWERS_NUMBER; $i += 1) {
        $rounds[] = prepareRound();
    }
    return Engine\runGame(RULE, $rounds);
}
