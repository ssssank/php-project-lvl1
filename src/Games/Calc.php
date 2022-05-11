<?php

namespace Brain\Games\Calc;

use Exception;

use function Brain\Utils\getRandomInt;
use function Brain\Engine\runGame;

use const Brain\Engine\WIN_ANSWERS_NUMBER;

const RULE = 'What is the result of the expression?';
const OPERATORS = ['+', '-', '*'];
const MAX_NUMBER = 10;

function getRightAnswer(int $firstNumber, string $operator, int $secondNumber)
{
    switch ($operator) {
        case ('+'):
            return $firstNumber + $secondNumber;
        case ('-'):
            return $firstNumber - $secondNumber;
        case ('*'):
            return $firstNumber * $secondNumber;
        default:
            throw new Exception("oops, unknown operation {$operator}");
    }
}

function getRandomOperator()
{
    return OPERATORS[getRandomInt(0, count(OPERATORS) - 1)];
}

function prepareRound()
{
    $operator = getRandomOperator();
    $firstNumber = getRandomInt(0, MAX_NUMBER);
    $secondNumber = getRandomInt(0, MAX_NUMBER);

    $question = "$firstNumber $operator $secondNumber";
    $rightAnswer = getRightAnswer($firstNumber, $operator, $secondNumber);

    return [
        'question' => $question,
        'answer' => (string) $rightAnswer
    ];
}

function startGame()
{
    $rounds = [];
    for ($i = 0; $i < WIN_ANSWERS_NUMBER; $i += 1) {
        $rounds[] = prepareRound();
    }
    return runGame(RULE, $rounds);
}
