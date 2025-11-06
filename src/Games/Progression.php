<?php

namespace BrainGames\Games\Progression;

use function BrainGames\Engine\runGame;

use const BrainGames\Engine\ROUNDS_COUNT;

function run(): void
{
    $questionsAndAnswers = [];

    for ($i = 0; $i < ROUNDS_COUNT; $i++) {
        $length = random_int(5, 10);
        $start = random_int(1, 50);
        $step = random_int(1, 10);
        $hiddenIndex = random_int(0, $length - 1);

        $progression = [];
        for ($j = 0; $j < $length; $j++) {
            $progression[] = $j === $hiddenIndex ? '..' : $start + $j * $step;
        }

        $question = implode(' ', $progression);
        $answer = (string) ($start + $hiddenIndex * $step);

        $questionsAndAnswers[] = [$question, $answer];
    }

    runGame('What number is missing in the progression?', $questionsAndAnswers);
}
