<?php

namespace Test;


use Ohce\Service\AnsweringMachine;
use PHPUnit\Framework\Attributes\Test;
use PHPUnit\Framework\TestCase;

class AnsweringMachineTest extends TestCase
{
    #[test]
    public function should_return_aloh_to_hola(): void
    {
        $machine = new AnsweringMachine();

        $res = $machine->answerTo('hola');

        self::assertEquals('aloh', $res);
    }

    #[test]
    public function should_return_girafe_to_efarig(): void
    {
        $machine = new AnsweringMachine();

        $res = $machine->answerTo('efarig');

        self::assertEquals('girafe', $res);
    }

    #[test]
    public function should_return_tacocat_and_bonita_palabra_to_tacocat(): void
    {
        $machine = new AnsweringMachine();

        $res = $machine->answerTo('tacocat');

        self::assertEquals('tacocat'.PHP_EOL.'¡Bonita palabra!', $res);
    }
}
