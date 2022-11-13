<?php

namespace CaioMarcatti12\Core\Cli\Adapter;

use Phalcon\Cop\Parser;
use CaioMarcatti12\Core\Cli\Interfaces\ArgvParserInterface;

class PhalconAdapter implements ArgvParserInterface
{
    private Parser $parserAdapter;
    private array $parameters;

    public function __construct()
    {
        $this->parserAdapter = new Parser();
        $this->parameters = $this->parserAdapter->parse();
    }

    public function getAll(): array
    {
        return $this->parameters;
    }

    public function get(string $key, mixed $defaultValue): mixed
    {
        return $this->parserAdapter->get($key, $defaultValue);
    }

    public function has(string $key): bool
    {
        return $this->parserAdapter->has($key);
    }
}