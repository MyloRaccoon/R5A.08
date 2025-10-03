<?php

namespace Ohce\Command;

use Ohce\Service\AnsweringMachine;
use Ohce\Service\Greeter;

class Ohce
{

    static public function run(Greeter $greeter, AnsweringMachine $answeringMachine, InputProvider $inputProvider): void
    {
        echo $greeter->greet() . PHP_EOL;

        foreach ($inputProvider->getInput() as $input) {
            echo $answeringMachine->answerTo($input) . PHP_EOL;
        }

        echo $greeter->sayGoodBye() . PHP_EOL;
    }

//    static public function runFromCli(Greeter $greeter, AnsweringMachine $answeringMachine): void
//    {
//        echo $greeter->greet();
//
//        $running = true;
//
//        do {
//            echo PHP_EOL."Please enter your word: ".PHP_EOL;
//            $word = readline();
//            if ($word === self::QUIT_CMD) {
//                $running = false;
//            } else {
//                echo $answeringMachine->answerTo($word) . PHP_EOL;
//            }
//        } while ($running);
//
//        echo $greeter->sayGoodBye() . PHP_EOL;
//
//    }
//
//    static public function runFromFile(Greeter $greeter, AnsweringMachine $answeringMachine, string $fileName): void
//    {
//        echo $greeter->greet() . PHP_EOL;
//
//        $file_reader = fopen($fileName, 'r');
//        if ($file_reader) {
//            while (($line = fgets($file_reader)) !== false) {
//                echo $answeringMachine->answerTo(trim($line)) . PHP_EOL;
//            }
//            fclose($file_reader);
//        }
//
//        echo $greeter->sayGoodBye() . PHP_EOL;
//    }
}