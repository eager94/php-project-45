<?php

namespace BrainGames\Engine;

use function BrainGames\Cli\greet;
use function cli\line;
use function cli\prompt;

function runGame(string $gameKey, array $questionsAndAnswers)
{
    $instructions = [
        'even' => 'Answer "yes" if the number is even, otherwise answer "no".',
        'calc' => 'What is the result of the expression?',
        'gcd' => 'Find the greatest common divisor of given numbers.',
        'progression' => 'What number is missing in the progression?',
        'prime' => 'Answer "yes" if given number is prime. Otherwise answer "no".'
    ];

    $instruction = $instructions[$gameKey] ?? 'Wrong gameKey! See src/Engine array $instructions';

    $name = greet();
    line($instruction);

    foreach ($questionsAndAnswers as [$question, $correctAnswer]) {
        line('Question: %s', $question);
        $userAnswer = prompt('Your answer');

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
