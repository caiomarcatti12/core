<?php

namespace CaioMarcatti12\Bean\Objects;

class InstanceSingleton
{
    private string $class;
    private ?object $instance;

    public function __construct(string $class, object $instance)
    {
        $this->class = $class;
        $this->instance = $instance;
    }

    public function getClass(): string
    {
        return $this->class;
    }

    public function getInstance(): ?object
    {
        return $this->instance ?? null;
    }
}