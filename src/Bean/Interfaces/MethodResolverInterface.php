<?php

namespace CaioMarcatti12\Bean\Interfaces;

use ReflectionMethod;

interface MethodResolverInterface
{
    public function handler(object &$instance, ReflectionMethod $reflectionMethod): void;
}