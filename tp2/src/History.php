<?php

namespace Dna;

use DateTime;
use DateTimeInterface;

class History
{

    static private string $path = 'ressources/history.json';

    public function record(string $dna1, string $dna2, int $distance)
    {
        $data = json_decode(file_get_contents(self::$path), true);
        $entry = array(
            'date'=> new DateTime('now')->format('Y-m-d'),
            'dna1'=> $dna1,
            'dna2'=> $dna2,
            'distance'=> $distance
        );
        $data[] = $entry;
        file_put_contents(self::$path, json_encode($data, JSON_PRETTY_PRINT));
    }

    public function stats(DateTimeInterface $analysedAt) {
        $data = json_decode(file_get_contents(self::$path), true);
        $stat = $data->find('date', $analysedAt);
    }

}