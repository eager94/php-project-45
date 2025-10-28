<?php

namespace BrainGames\Games\Prime;

use function BrainGames\Engine\runGame;

function playPrime()
{
    $questionsAndAnswers = [];

    for ($i = 0; $i < 3; $i++) {
        $number = rand(2, 100);
        $question = (string) $number;
        $correctAnswer = isPrime($number) ? 'yes' : 'no';

        $questionsAndAnswers[] = [$question, $correctAnswer];
    }

    runGame('prime', $questionsAndAnswers);
}

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
