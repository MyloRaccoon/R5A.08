<?php


use Dna\DnaSequence;
use PHPUnit\Framework\TestCase;
use Dna\InvalidDnaSequenceException;
class DnaSequenceTest extends TestCase
{

    public function testInvalidSequenceThrowsException()
    {
        $this->expectException(InvalidDnaSequenceException::class);
        new DnaSequence("AXTG");
    }
    public function testNextReturnsCorrectGenes()
    {
        $sequence = new DnaSequence("ATC");

        $this->assertEquals('A', $sequence->next());
        $this->assertEquals('T', $sequence->next());
        $this->assertEquals('C', $sequence->next());
        $this->assertNull($sequence->next());
    }

    public function testSizeReturnsCorrectLength()
    {
        $sequence = new DnaSequence("GATTACA");
        $this->assertEquals(7, $sequence->size());
    }
}
