<?php

namespace Dna;

class DnaSequence
{

    public array $sequence;
    private int $counter;

    public function __construct(string $sequence) {
        foreach (str_split($sequence) as $gene) {
            if (!in_array($gene, ['A', 'T', 'C', 'G'])) {
                throw new InvalidDnaSequenceException("The gene $gene is not valid");
            } else {
                $this->sequence[] = $gene;
            }
        }
        $this->counter = -1;
    }

    public function next(): string|null {
        $this->counter++;
        return $this->sequence[$this->counter] ?? null;
    }

    public function size(): int {
        return count($this->sequence);
    }

}