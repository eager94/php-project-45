<?php

namespace BrainGames\Games\Gcd;

use function BrainGames\Engine\runGame;

function playGcd(): void
{
    $questionsAndAnswers = [];

    for ($i = 0; $i < \BrainGames\Engine\ROUNDS_COUNT; $i++) {
        $num1 = random_int(1, 100);
        $num2 = random_int(1, 100);

        $question = "$num1 $num2";
        $correctAnswer = (string) gcd($num1, $num2);

        $questionsAndAnswers[] = [$question, $correctAnswer];
    }

    runGame('gcd', $questionsAndAnswers);
}

function gcd(int $a, int $b): int
{
    while ($b !== 0) {
        $temp = $b;
        $b = $a % $b;
        $a = $temp;
    }

    return $a;
}
