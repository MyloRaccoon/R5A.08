<?php

use Ohce\Service\Greeter;
use PHPUnit\Framework\Attributes\Test;
use PHPUnit\Framework\TestCase;

class GreeterTest extends TestCase {
    #[Test]
    public function should_return_buenas_noches_madeline_between_20h_and_6h() {
        $greeter = new Greeter("Madeline", 20);

        $result = $greeter->greet();

        self::assertEquals('Buenas noches Madeline', $result);
    }

    #[Test]
    public function should_return_buenas_tardes_madeline_between_12h_and_20h() {
        $greeter = new Greeter("Madeline", 13);

        $result = $greeter->greet();

        self::assertEquals('Buenas tardes Madeline', $result);
    }

    #[Test]
    public function should_return_buenos_dias_madeline_between_6h_and_12h() {
        $greeter = new Greeter("Madeline", 7);

        $result = $greeter->greet();

        self::assertEquals('Buenas dias Madeline', $result);
    }

    #[Test]
    public function should_say_adioas_madeline(): void
    {
        $greeter = new Greeter("Madeline");

        $result = $greeter->sayGoodBye();

        self::assertEquals('Adios Madeline', $result);
    }

    #[Test]
    public function should_say_adios_badeline(): void {
        $greeter = new Greeter("Madeline");

        $result = $greeter->sayGoodBye();

        self::assertEquals('Adios Madeline', $result);
    }



}