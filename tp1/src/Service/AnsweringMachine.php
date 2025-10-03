<?php

namespace Ohce\Service;
class AnsweringMachine
{

    public function __construct()
    {
    }

    public function answerTo(string $word): string
    {
        $answer = strrev($word);

        if($answer==$word){
            $answer .= PHP_EOL.'¡Bonita palabra!';
        }
        return $answer;
    }
}