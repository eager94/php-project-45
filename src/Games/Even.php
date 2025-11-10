<?php

namespace BrainGames\Games\Even;

use function BrainGames\Engine\runGame;

use const BrainGames\Engine\ROUNDS_COUNT;

function run(): void
{
    $questionsAndAnswers = [];

    for ($i = 0; $i < ROUNDS_COUNT; $i++) {
        $number = random_int(1, 100);
        $question = (string) $number;
        $correctAnswer = isEven($number) ? 'yes' : 'no';

        $questionsAndAnswers[] = [$question, $correctAnswer];
    }

    runGame('Answer "yes" if the number is even, otherwise answer "no".', $questionsAndAnswers);
}

function isEven(int $number): bool
{
    return $number % 2 === 0;
}
