<?php

use Ohce\Command\CliInputProvider;
use Ohce\Command\FileInputProvider;
use Ohce\Command\Ohce;
use Ohce\Service\AnsweringMachine;
use Ohce\Service\Greeter;

require_once "vendor/autoload.php";

function helpMessage(): void
{
    echo "usage: php ohce.php <username> [<filename>]\n";
}

if ($argc < 2) {
   helpMessage();
    exit(1);
}

$username = $argv[1];

if($argc === 2){
    $inputProvider = new CliInputProvider();
} else if ($argc === 3) {
    $fileName = $argv[2];
    $inputProvider = new FileInputProvider($fileName);
} else {
    helpMessage();
    exit(1);
}

$current_hour = (int)((new DateTimeImmutable('now'))->format('H'));
$greeter = new Greeter($username, $current_hour);
$answeringMachine = new AnsweringMachine();

Ohce::run($greeter, $answeringMachine, $inputProvider);
exit(0);