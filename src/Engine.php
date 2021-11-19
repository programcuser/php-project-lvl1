<?php

namespace Games\Engine;

use function cli\line;
use function cli\prompt;

function welcomeToGame()
{
    line('Welcome to the Brain Game!');
}

function getUserName(): string
{
    return prompt('May I have your name?');
}

function greetingsForUser(string $userName)
{
    line("Hello, %s!", $userName);
}

function printRules(string $rule)
{
    line($rule);
}

function beginBlockGame(string $rule)
{
    welcomeToGame();
    greetingsForUser(getUserName());
    printRules($rule);
}

function askQuestion(string $question)
{
    line("Question: " . $question);
}

function getAnswer(): string
{
    return prompt("Your answer");
}

function isEqualAnswers(string $firstAnsw, string $secondAnsw): bool
{
    return $firstAnsw === $secondAnsw;
}

function printAnswersComparison(string $userAnswer, string $answer, string $usrName)
{
    if ($userAnswer === $answer) {
        line("Correct!");
    } else {
        line("'%s' is wrong answer ;(. Correct answer was '%s'", $userAnswer, $answer);
        line("Let's try again, {$usrName}!");
    }
}

function printCongratulations(string $usrName)
{
    line("Congratulations, {$usrName}!");
}
