<?php

namespace BrainGames\Games\Prime;

use function BrainGames\Engine\runGame;

use const BrainGames\Engine\ROUNDS_COUNT;

function isPrime(int $number): bool
{
    if ($number <= 1) {
        return false;
    }
    for ($i = 2; $i * $i <= $number; $i++) {
        if ($number % $i === 0) {
            return false;
        }
    }
    return true;
}

function run(): void
{
    $questionsAndAnswers = [];

    for ($i = 0; $i < ROUNDS_COUNT; $i++) {
        $number = random_int(2, 100);
        $question = (string) $number;
        $answer = isPrime($number) ? 'yes' : 'no';

        $questionsAndAnswers[] = [$question, $answer];
    }

    runGame('Answer "yes" if given number is prime. Otherwise answer "no".', $questionsAndAnswers);
}
