<?php

namespace Ohce\Command;

use http\Exception\RuntimeException;

class FileInputProvider implements InputProvider
{
    private string $file_name;

    public function __construct(string $file_name)
    {
        $this->file_name = $file_name;
    }

    public function getInput(): iterable
    {
        $handle = fopen($this->file_name, "r");
        if (!$handle) {throw new RuntimeException("Cannot open file '{$this->file_name}'.");}

        while (($line = fgets($handle)) !== false) {
            yield trim($line);
        }

        fclose($handle);
    }
}