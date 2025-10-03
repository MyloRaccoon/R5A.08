<?php

namespace Dna;

class GeneSequencer
{

    function countDistance(DnaSequence $dnaSequence1, DnaSequence $dnaSequence2): int
    {
        if ($dnaSequence1->size() != $dnaSequence2->size()) {
            throw new NotComparableDnaSequence('Different sizes DNA sequences cannot be compared');
        }

        $distance = 0;

        for ($i = 0; $i < $dnaSequence1->size(); $i++) {
            if ($dnaSequence1->next() != $dnaSequence2->next()) {
                $distance++;
            }
        }

        return $distance;
    }

}