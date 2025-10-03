<?php

require "vendor/autoload.php";

use Dna\DnaSequence;
use Dna\GeneSequencer;
use Dna\InvalidDnaSequenceException;
use Dna\NotComparableDnaSequence;

try {
    $dnaSequence1 = new DnaSequence($argv[1]);
    $dnaSequence2 = new DnaSequence($argv[2]);
} catch (InvalidDnaSequenceException $e) {
    echo "Error, invalid dna sequence: " . $e->getMessage() . PHP_EOL;
    exit(1);
}

$geneSequencer = new GeneSequencer();
try {
    printf("Distance : %d\n", $geneSequencer->countDistance($dnaSequence1, $dnaSequence2));
} catch (NotComparableDnaSequence $e) {
    echo "Error, not comparable dna sequence: " . $e->getMessage() . PHP_EOL;
    exit(1);
}
