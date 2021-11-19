<?php

namespace Games\Brain\Even;

use function Games\Engine\welcomeToGame;
use function Games\Engine\getUserName;
use function Games\Engine\greetingsForUser;
use function Games\Engine\printRules;
use function Games\Engine\askQuestion;
use function Games\Engine\getAnswer;
use function Games\Engine\isEqualAnswers;
use function Games\Engine\printAnswersComparison;
use function Games\Engine\printCongratulations;

function isEven(int $num)
{
    return $num % 2 === 0;
}

function runBrainEvenGame(int $cycles)
{
    welcomeToGame();
    $name = getUserName();
    greetingsForUser($name);

    printRules('Answer "yes" if the number is even, otherwise answer "no".');

    $i = 0;
    while ($i < $cycles) {
        $randNum = rand(1, 100);
        $answer = isEven($randNum) ? 'yes' : 'no';
        askQuestion((string) $randNum);
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
