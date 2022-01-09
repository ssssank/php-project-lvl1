<?php

namespace Brain\Games\Even;

use Brain\Engine;

use function Brain\Utils\getRandomInt;

const RULE = 'Answer "yes" if the number is even, otherwise answer "no".';

function isEven(int $number)
{
    return $number % 2 === 0;
}

function getRightAnswer(int $question)
{
    return isEven($question) ? 'yes' : 'no';
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
