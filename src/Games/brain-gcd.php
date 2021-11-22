<?php

namespace Games\Brain\Gcd;

use function Games\Engine\welcomeToGame;
use function Games\Engine\getUserName;
use function Games\Engine\greetingsForUser;
use function Games\Engine\printRules;
use function Games\Engine\askQuestion;
use function Games\Engine\getAnswer;
use function Games\Engine\isEqualAnswers;
use function Games\Engine\printAnswersComparison;
use function Games\Engine\printCongratulations;

/*
function calculateGcd(int $num1, int $num2): int
{
    $minNum = min($num1, $num2);

    $i = $minNum;
    while ($i >= 1) {
        if (($num1 % $i === 0) && ($num2 % $i === 0)) {
            return $i;
        }
        $i--;
    }
}
*/

function calculateGcd(int ...$nums): int
{
    $minNum = min($nums);

    $i = $minNum;
    while ($i >= 1) {
        $isGcd = true;
        foreach ($nums as $num) {
            if ($num % $i !== 0) {
                $isGcd = false;
                break;
            }
        }
        if ($isGcd) {
            return $i;
        }
        $i--;
    }
}

function runBrainGcdGame(int $cycles)
{
    welcomeToGame();
    $name = getUserName();
    greetingsForUser($name);

    printRules('Find the greatest common divisor of given numbers.');

    $i = 0;
    while ($i < $cycles) {
        $randNum1 = rand(1, 100);
        $randNum2 = rand(1, 100);

        $expression = "{$randNum1} {$randNum2}";

        $answer = calculateGcd($randNum1, $randNum2);

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
