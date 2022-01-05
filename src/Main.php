<?php

namespace Brain\Games\Main;

use function cli\line;
use function cli\prompt;

function getUserName()
{
    $name = prompt("May I have your name?");
    return $name;
}

function generateRandomInt()
{
    return rand(0, 100);
}

function showQuestion($question)
{
    line("Question: $question");
}

function getAnswer()
{
    $answer = prompt("Your answer: ");
    return $answer;
}

function isEven($number)
{
    return $number % 2 === 0;
}

function isCorrectEvenAnswer($answer, $number)
{
    if ($answer === 'yes' && isEven($number) || $answer === 'no' && !isEven($number)) {
        return true;
    }
    return false;
}

function loseMessage($userAnswer, $randomNumber, $userName)
{
    $rightAnswer = isEven($randomNumber) ? 'yes' : 'no';
    line("$userAnswer is wrong answer ;(. Correct answer was $rightAnswer.");
    line("Let's try again,  $userName!");
}

function winMessage($userName)
{
    line("Congratulations, $userName");
}

function startEvenGame()
{
    $winAnswersNumber = 3;
    $rightAnswerCounter = 0;

    line("Welcome to the Brain Game!");
    $userName = getUserName();
    line("Hello, %s!", $userName);
    line("Answer \"yes\" if the number is even, otherwise answer \"no\".");

    while ($rightAnswerCounter < $winAnswersNumber) {
        $randomNumber = generateRandomInt();
        showQuestion($randomNumber);
        $answer = getAnswer();
        if (isCorrectEvenAnswer($answer, $randomNumber)) {
            line("Correct!");
            $rightAnswerCounter += 1;
        } else {
            loseMessage($answer, $randomNumber, $userName);
            break;
        }
    }

    if ($rightAnswerCounter === $winAnswersNumber) {
        winMessage($userName);
    }
}
