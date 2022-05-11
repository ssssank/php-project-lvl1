<?php

namespace Brain\Games\Progression;

use Brain\Engine;

use function Brain\Utils\getRandomInt;

const RULE = 'What number is missing in the progression?';
const PROGRESSION_LENGTH = 10;
const MAX_NUMBER = 10;

function getProgression(int $length, int $start, int $step)
{
    $progression = [];
    for ($i = 0; $i < $length; $i += 1) {
        $progression[] = $start + $step * $i;
    }
    return $progression;
}

function prepareRound()
{
    $progressionStart = getRandomInt();
    $progressionStep = getRandomInt(0, MAX_NUMBER);
    $randomIndex = getRandomInt(0, PROGRESSION_LENGTH - 1);

    $progression = getProgression(PROGRESSION_LENGTH, $progressionStart, $progressionStep);

    $rightAnswer = $progression[$randomIndex];
    $progression[$randomIndex] = '..';
    $question = implode(' ', $progression);

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
