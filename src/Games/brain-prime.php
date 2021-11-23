<?php

namespace Games\Brain\Prime;

use function Games\Engine\welcomeToGame;
use function Games\Engine\getUserName;
use function Games\Engine\greetingsForUser;
use function Games\Engine\printRules;
use function Games\Engine\askQuestion;
use function Games\Engine\getAnswer;
use function Games\Engine\isEqualAnswers;
use function Games\Engine\printAnswersComparison;
use function Games\Engine\printCongratulations;

function isPrime($number): bool
{
    if ($number === 1) {
        return false;
    }

    $i = (int) ($number / 2);
    while ($i > 1) {
        if ($number % $i === 0) {
            return false;
        }
        $i--;
    }

    return true;
}


function runBrainPrimeGame(int $cycles)
{
    welcomeToGame();
    $name = getUserName();
    greetingsForUser($name);

    printRules('Answer "yes" if given number is prime. Otherwise answer "no".');

    $i = 0;
    while ($i < $cycles) {
        $randNum = rand(1, 100);

        $expression = "{$randNum}";

        $answer = isPrime($randNum) ? 'yes' : 'no';

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
