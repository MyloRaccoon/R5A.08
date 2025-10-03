<?php

namespace Ohce\Service;
class Greeter
{

    const START_TARDES = 12;
    const START_NOCHES = 18;
    const START_DIAS = 6;
    public string $name;
    public int $hour;

    public function __construct(string $name, int $hour)
    {
        $this->name = $name;
        $this->hour = $hour;
    }

    public function greet(): string
    {
        return match (true) {
            $this->isTardes($this->hour) => "Buenas tardes $this->name",
            $this->isDias($this->hour) => "Buenas dias $this->name",
            $this->isNoches($this->hour) => "Buenas noches $this->name",
        };
    }

    /**
     * @param int $hour
     * @return bool
     */
    public function isTardes(int $hour): bool
    {
        return $hour >= self::START_TARDES && $hour <= self::START_NOCHES;
    }

    /**
     * @param int $hour
     * @return bool
     */
    public function isDias(int $hour): bool
    {
        return $hour >= self::START_DIAS && $hour < self::START_TARDES;
    }

    /**
     * @params int $hour
     * @return bool
     */

    public function isNoches(int $hour): bool
    {
        return $hour >= self::START_NOCHES || $hour < self::START_DIAS;
    }

    public function sayGoodBye()
    {
        return "Adios $this->name";
    }
}