<?php

namespace CaioMarcatti12\Factory\Annotation;

use Attribute;

#[Attribute(Attribute::TARGET_PROPERTY)]
final class Autowired
{
    private string $className = '';

    public function __construct(string $className = '')
    {
        $this->className = $className;
    }

    public function getClassName(): string
    {
        return $this->className;
    }
}