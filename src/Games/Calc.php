<?php

namespace BrainGames\Games\Calc;

use function BrainGames\Engine\runGame;

function playCalc()
{
    $questionsAndAnswers = [];
    $operators = ['+', '-', '*'];

    for ($i = 0; $i < \BrainGames\Engine\ROUNDS_COUNT; $i++) {
        $num1 = rand(1, 100);
        $num2 = rand(1, 100);
        $operator = $operators[array_rand($operators)];

        $question = "$num1 $operator $num2";
        $correctAnswer = '';
        switch ($operator) {
            case '+':
                $correctAnswer = (string) ($num1 + $num2);
                break;
            case '-':
                $correctAnswer = (string) ($num1 - $num2);
                break;
            case '*':
                $correctAnswer = (string) ($num1 * $num2);
                break;
            default:
                $correctAnswer = '0';
                break;
        }
        $questionsAndAnswers[] = [$question, $correctAnswer];
    }

    runGame('calc', $questionsAndAnswers);
}
