<?php

namespace CaioMarcatti12\Core\Bean\Interfaces;

use ReflectionMethod;

interface MethodResolverInterface
{
    public function handler(object &$instance, ReflectionMethod $reflectionMethod): void;
}