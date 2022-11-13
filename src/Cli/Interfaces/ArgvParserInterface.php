<?php

namespace CaioMarcatti12\Core\Cli\Interfaces;

interface ArgvParserInterface
{
    public function __construct();
    public function getAll() : array;
    public function get(string $key, mixed $defaultValue) : mixed;
    public function has(string $key) : bool;
}