<?php

namespace Ohce\Command;

class CliInputProvider implements InputProvider
{

    const string QUIT_CMD = 'Quit!';

    public function getInput(): iterable
    {
        while (true) {
            echo PHP_EOL . "Please enter your word: " . PHP_EOL;
            $input = readline();
            yield $input;
            if ($input === self::QUIT_CMD) {
                break;
            }
        }
    }
}