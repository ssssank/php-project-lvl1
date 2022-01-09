<?php

namespace Brain\Games\Calc;

use Brain\Engine;

use function Brain\Utils\getRandomInt;

const RULE = 'What is the result of the expression?';
const OPERATORS = ['+', '-', '*'];
const MAX_NUMBER_DEFAULT = 50;
const MAX_NUMBER_FOR_MULTIPLY = 11;

function getRightAnswer($firstNumber, $operator, $secondNumber)
{
    switch ($operator) {
        case ('+'):
            return $firstNumber + $secondNumber;
        case ('-'):
            return $firstNumber - $secondNumber;
        default:
            return $firstNumber * $secondNumber;
    }
}

function getRandomOper()
{
    return OPERATORS[getRandomInt(0, count(OPERATORS) - 1)];
}

function prepareRound()
{

    $operator = getRandomOper();
    $maxNumberForGeneration = $operator === '*' ? MAX_NUMBER_FOR_MULTIPLY : MAX_NUMBER_DEFAULT;
    $firstNumber = getRandomInt(0, $maxNumberForGeneration);
    $secondNumber = getRandomInt(0, $maxNumberForGeneration);
    $question = "$firstNumber $operator $secondNumber";
    $rightAnswer = getRightAnswer($firstNumber, $operator, $secondNumber);
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
