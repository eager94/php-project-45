<?php

namespace BrainGames\Games\Calc;

use function BrainGames\Engine\runGame;

use const BrainGames\Engine\ROUNDS_COUNT;

function run(): void
{
    $operators = ['+', '-', '*'];
    $questionsAndAnswers = [];

    for ($i = 0; $i < ROUNDS_COUNT; $i++) {
        $num1 = random_int(1, 100);
        $num2 = random_int(1, 100);
        $operator = $operators[array_rand($operators)];

        $question = "$num1 $operator $num2";
        $answer = (string) calculate($num1, $num2, $operator); // ← (string) здесь

        $questionsAndAnswers[] = [$question, $answer];
    }

    runGame('What is the result of the expression?', $questionsAndAnswers);
}

function calculate(int $a, int $b, string $operator): int
{
    switch ($operator) {
        case '+':
            return $a + $b;
        case '-':
            return $a - $b;
        case '*':
            return $a * $b;
        default:
            throw new \Exception("Unknown operator");
    }
}
