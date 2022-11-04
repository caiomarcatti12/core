<?php

namespace CaioMarcatti12\Core\Bean\Interfaces;

use ReflectionProperty;

interface PropertyResolverInterface
{
    public function handler(object &$instance, ReflectionProperty $reflectionProperty): void;
}