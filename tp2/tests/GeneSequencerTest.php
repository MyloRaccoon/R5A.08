<?php


use Dna\DnaSequence;
use Dna\GeneSequencer;
use Dna\NotComparableDnaSequence;
use PHPUnit\Framework\Attributes\DataProvider;
use PHPUnit\Framework\TestCase;

class GeneSequencerTest extends TestCase
{
    #[DataProvider("provideDnaSequences")]
    public function testCountDistanceWithDataProvider(string $seq1, string $seq2, int $expectedDistance): void
    {
        $dna1 = new DnaSequence($seq1);
        $dna2 = new DnaSequence($seq2);

        $sequencer = new GeneSequencer();
        $this->assertEquals($expectedDistance, $sequencer->countDistance($dna1, $dna2));
    }

    public static function provideDnaSequences(): array
    {
        return [
            'identical sequences' => ['ATGC', 'ATGC', 0],
            'one difference'      => ['ATGC', 'ATAC', 1],
            'all different'       => ['AAAA', 'TTTT', 4],
            'two differences'     => ['AGTC', 'AGTT', 1],
            'no match'            => ['ACGT', 'TGCA', 4],
        ];
    }

    public function testCountDistanceThrowsOnDifferentSizes(): void
    {
        $this->expectException(NotComparableDnaSequence::class);

        $seq1 = new DnaSequence("ATG");
        $seq2 = new DnaSequence("ATGC");

        $sequencer = new GeneSequencer();
        $sequencer->countDistance($seq1, $seq2);
    }
}
