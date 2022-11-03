<?php

namespace CaioMarcatti12\Bean\Interfaces;

use ReflectionProperty;

interface PropertyResolverInterface
{
    public function handler(object &$instance, ReflectionProperty $reflectionProperty): void;
}