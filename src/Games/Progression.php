<?php

namespace BrainGames\Games\Progression;

use function BrainGames\Engine\runGame;

function playProgression()
{
    $questionsAndAnswers = [];

    for ($i = 0; $i < \BrainGames\Engine\ROUNDS_COUNT; $i++) {
        $length = rand(5, 10);
        $start = rand(1, 50);
        $step = rand(1, 10);
        $hiddenIndex = rand(0, $length - 1);

        $progression = generateProgression($start, $step, $length, $hiddenIndex);
        $question = implode(' ', $progression);
        $correctAnswer = (string) ($start + $hiddenIndex * $step);

        $questionsAndAnswers[] = [$question, $correctAnswer];
    }

    runGame('progression', $questionsAndAnswers);
}

function generateProgression(int $start, int $step, int $length, int $hiddenIndex): array
{
    $progression = [];

    for ($i = 0; $i < $length; $i++) {
        $progression[] = $i === $hiddenIndex ? '..' : $start + $i * $step;
    }

    return $progression;
}
