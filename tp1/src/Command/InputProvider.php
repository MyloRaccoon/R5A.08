<?php

namespace Ohce\Command;


interface InputProvider
{
    public function getInput(): iterable;
}