<?php

namespace Games\Brain\Calc;

use function Games\Engine\welcomeToGame;
use function Games\Engine\getUserName;
use function Games\Engine\greetingsForUser;
use function Games\Engine\printRules;
use function Games\Engine\askQuestion;
use function Games\Engine\getAnswer;
use function Games\Engine\isEqualAnswers;
use function Games\Engine\printAnswersComparison;
use function Games\Engine\printCongratulations;

function calculateExpression(int $operand1, int $operand2, string $operation): int
{
    if ($operation === '+') {
        return $operand1 + $operand2;
    } elseif ($operation === '-') {
        return $operand1 - $operand2;
    } elseif ($operation === '*') {
        return $operand1 * $operand2;
    }
}

function runBrainCalcGame(int $cycles)
{
    welcomeToGame();
    $name = getUserName();
    greetingsForUser($name);

    printRules('What is the result of the expression?');

    $operations = ['+', '-', '*'];

    $i = 0;
    while ($i < $cycles) {
        $randNum1 = rand(1, 100);
        $randNum2 = rand(1, 100);
        $randOper = rand(0, 2);
        $charOper = $operations[$randOper];

        $expression = "{$randNum1} {$charOper} {$randNum2}";

        $answer = calculateExpression($randNum1, $randNum2, $charOper);

        askQuestion($expression);
        $userAnswer = getAnswer();

        printAnswersComparison($userAnswer, $answer, $name);
        if (!isEqualAnswers($userAnswer, $answer)) {
            break;
        }
        $i++;
    }

    if ($i >= $cycles - 1) {
        printCongratulations($name);
    }
}
