<?php

namespace BrainGames\Even;

use function BrainGames\Cli\greet;
use function cli\line;
use function cli\prompt;

function playEven()
{
    $name = greet();
    line('Answer "yes" if the number is even, otherwise answer "no".');

    for ($i = 0; $i < \BrainGames\Engine\ROUNDS_COUNT; $i++) {
        $number = rand(1, 100);
        line('Question: %s', $number);
        $userAnswer = prompt('Your answer');

        $isEven = $number % 2 === 0;
        $correctAnswer = $isEven ? 'yes' : 'no';

        if ($userAnswer === $correctAnswer) {
            line('Correct!');
        } else {
            line("'%s' is wrong answer ;(. Correct answer was '%s'.", $userAnswer, $correctAnswer);
            line("Let's try again, %s!", $name);
            return;
        }
    }

    line('Congratulations, %s!', $name);
}
