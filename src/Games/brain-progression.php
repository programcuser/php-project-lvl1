<?php

namespace Games\Brain\Progression;

use function Games\Engine\welcomeToGame;
use function Games\Engine\getUserName;
use function Games\Engine\greetingsForUser;
use function Games\Engine\printRules;
use function Games\Engine\askQuestion;
use function Games\Engine\getAnswer;
use function Games\Engine\isEqualAnswers;
use function Games\Engine\printAnswersComparison;
use function Games\Engine\printCongratulations;

function makeProgression(int $firstElmnt = 1, int $progrLen = 1, int $progrStep = 1): array
{
    $result = [$firstElmnt];

    for ($i = 1; $i < $progrLen; $i++) {
        $result[] = $result[$i - 1] + $progrStep;
    }

    //for ($i = 1; $i < $progrLen; $i++) {
    //    $result[] = $result[0] + $progrStep * $i;
    //}

    return $result;
}


function runBrainProgressionGame(int $cycles)
{
    welcomeToGame();
    $name = getUserName();
    greetingsForUser($name);

    printRules('What number is missing in the progression?');

    $i = 0;
    while ($i < $cycles) {
        $progressionLength = rand(5, 10);
        $firstElement = rand(1, 50);
        $progressionStep = rand(1, 9);
        $randomIndex = rand(0, $progressionLength - 1);

        $progression = makeProgression($firstElement, $progressionLength, $progressionStep);
        $answer = $progression[$randomIndex];
        $progression[$randomIndex] = '..';

        $expression = implode(' ', $progression);

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
