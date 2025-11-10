<?php

namespace BrainGames\Games\Gcd;

use function BrainGames\Engine\runGame;

use const BrainGames\Engine\ROUNDS_COUNT;

function run(): void
{
    $questionsAndAnswers = [];

    for ($i = 0; $i < ROUNDS_COUNT; $i++) {
        $num1 = random_int(1, 100);
        $num2 = random_int(1, 100);

        $question = "$num1 $num2";
        $answer = (string) getGcd($num1, $num2);

        $questionsAndAnswers[] = [$question, $answer];
    }

    runGame('Find the greatest common divisor of given numbers.', $questionsAndAnswers);
}

function getGcd(int $a, int $b): int
{
    $a = abs($a);
    $b = abs($b);
    while ($b !== 0) {
        [$a, $b] = [$b, $a % $b];
    }
    return $a;
}
